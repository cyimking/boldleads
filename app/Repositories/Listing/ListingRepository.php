<?php

namespace BoldLeads\Repositories\Listing;

interface ListingRepository
{
    /**
     * @param $perPage
     * @return mixed
     */
    public function paginate($perPage);

    /**
     * @param $listingID
     * @return mixed
     */
    public function find($listingID);

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * @param $listingID
     * @param array $data
     * @return mixed
     */
    public function update($listingID, array $data);

    /**
     * @param $listingID
     * @return mixed
     */
    public function delete($listingID);
}