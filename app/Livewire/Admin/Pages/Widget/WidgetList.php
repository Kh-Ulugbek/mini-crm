<?php

namespace App\Livewire\Admin\Pages\Widget;

use App\Models\Ticket;
use Livewire\Component;
use Livewire\WithPagination;

class WidgetList extends Component
{
    use WithPagination;

    public $sort_type = 'tickets.title';
    public $direction = 'asc';
    public $search_term = '';

    public function sort($type)
    {
        if ($this->direction == 'asc' and $this->sort_type == $type) {
            $this->direction = 'desc';
            $this->sort_type = $type;
        } else {
            $this->direction = 'asc';
            $this->sort_type = $type;
        }
        $this->updatingSearch();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $list = Ticket::query()
            ->when($this->search_term != '', function ($q) {
                $q->where('title', 'like', '%' . strtolower($this->search_term) . '%');
            })
            ->when($this->sort_type, function ($q) {
                $q->orderBy($this->sort_type, $this->direction);
            })
            ->paginate();
        return view('livewire..admin.pages.widget.widget-list', compact('list'));
    }
}
