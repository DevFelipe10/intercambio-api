<?php

namespace App\Models\Chat\Requesters;

/**
 * Class responsable to save data request from /enviarMensagem endpoint
 */
class ChatSendMessage
{
    /**
     * @var MessagePack[] $messages
     */
    private $messages = [];

    public function __construct(array $array)
    {
        foreach($array as $block) {
            $this->messages[] = new MessagePack($block);
        }
    }

    public function toArray(): array{
        $array = [];
        
        if($this->messages != null){
            foreach($this->messages as $data){
                array_push($array, $data->toArray());
            }
        }

        return $array;
    }


}
