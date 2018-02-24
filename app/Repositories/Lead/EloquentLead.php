<?php

namespace BoldLeads\Repositories\Lead;

use BoldLeads\Lead;

class EloquentLead implements LeadRepository
{

    /**
     * {@inheritdoc}
     */
    public function paginate($perPage)
    {
        return (new Lead)->orderBy('id', 'desc')
            ->paginate($perPage);
    }

    /**
     * {@inheritdoc}
     */
    public function find($leadID)
    {
        return (new Lead)->find($leadID);
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $data)
    {
        return Lead::create($data);
    }

    /**
     * {@inheritdoc}
     */
    public function update($leadID, array $data)
    {
        $lead = $this->find($leadID);
        $lead->update($data);

        return $lead;
    }

    /**
     * {@inheritdoc}
     */
    public function delete($leadID)
    {
        $lead = $this->find($leadID);

        return $lead->delete();
    }
}