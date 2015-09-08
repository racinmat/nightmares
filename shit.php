//because filtering in database is too mainstream

    /**
     * @return array
     */
    public function getNewestEvents()
    {
        $events = $this->eventRepository->findBy([], ['startDate' => 'DESC'], 2);
        $newestEvents = array();
        foreach($events as $event)
        {
            if($event->endDate > new \DateTime() || $event->endDate == null)
                $newestEvents[] = $event;
        }

        return $newestEvents;
    }
