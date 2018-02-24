<?php

namespace BoldLeads\Repositories\Listing;

use BoldLeads\Listing;

class EloquentListing implements ListingRepository
{

    /**
     * {@inheritdoc}
     */
    public function paginate($perPage)
    {
        return (new Listing)->latest()
            ->simplePaginate($perPage);
    }

    /**
     * {@inheritdoc}
     */
    public function find($listingID)
    {
        return (new Listing)->find($listingID);
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $data)
    {
        return Listing::create($data);
    }

    /**
     * {@inheritdoc}
     */
    public function update($listingID, array $data)
    {
        $listing = $this->find($listingID);
        $listing->update($data);

        return $listing;
    }

    /**
     * {@inheritdoc}
     */
    public function delete($listingID)
    {
        $listing = $this->find($listingID);

        return $listing->delete();
    }
}