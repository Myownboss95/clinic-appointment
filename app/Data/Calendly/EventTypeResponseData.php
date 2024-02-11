<?php

namespace App\Data\Calendly;


use Saloon\Contracts\Response;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Data;

class EventTypeResponseData extends Data
{
    public function __construct(
        #[DataCollectionOf(EventData::class)]
        public readonly DataCollection $event
    ) {
    }

    public static function fromResponse(Response $response): self
    {
        $data = $response->json('collection');

        return new self(
            EventData::collection(
                $data['scheduling_url'], 
                $data['uri'], 
                $data 
                )
        );
    }
}
