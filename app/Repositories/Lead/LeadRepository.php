<?php

namespace BoldLeads\Repositories\Lead;

interface LeadRepository
{
    /**
     * @param $perPage
     * @return mixed
     */
    public function paginate($perPage);

    /**
     * @param $leadID
     * @return mixed
     */
    public function find($leadID);

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * @param $leadID
     * @param array $data
     * @return mixed
     */
    public function update($leadID, array $data);

    /**
     * @param $leadID
     * @return mixed
     */
    public function delete($leadID);
}