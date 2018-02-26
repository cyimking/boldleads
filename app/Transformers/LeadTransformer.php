<?php

namespace BoldLeads\Transformers;

use BoldLeads\Lead;
use League\Fractal\TransformerAbstract;

class LeadTransformer extends TransformerAbstract
{
    /**
     * Transform Lead into an Array
     *
     * @param Lead $lead
     * @return array
     */
    public function transform(Lead $lead): array
    {
        return [
            'id' => $lead->id,
            'first_name' => $lead->first_name,
            'last_name' => $lead->last_name,
            'email' => $lead->email,
            'address' => $lead->address,
            'phone_number' => $lead->phone_number,
            'home_square_footage' => $lead->home_square_footage,
            'created_at' => (string) $lead->created_at,
            'updated_at' => (string) $lead->updated_at
        ];
    }
}