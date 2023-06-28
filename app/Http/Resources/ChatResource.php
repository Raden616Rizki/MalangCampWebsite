<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'chat_id' => $this -> chat_id,
            'sender_id' => $this -> sender_id,
            'receiver_id' => $this -> receiver_id,
            'chat' => $this -> chat,
            'file' => $this -> file,
            'date_time' => $this -> date_time,
            'is_read' => $this -> is_read,
        ];
    }
}
