<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'customer' => [
                'id' => $this->customer->id,
                'name' => $this->customer->name,
                'email' => $this->customer->email,
                'phone' => $this->customer->phone,
            ],
            'title' => $this->title,
            'text' => $this->text,
            'status' => $this->status,
            'created_at' => $this->created_at->toDateTimeString(),
            'manager_reply_date' => $this->manager_reply_date?->toDateTimeString(),
        ];
    }
}
