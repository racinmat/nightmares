//in model, eventManager: because filtering in database is too mainstream

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


//in basePresenter
	public function createComponent($name) {
		if ( $name !== 'frame' ) {
			$name = '\\EFF\\Components\\'.$name;
			if (class_exists($name)) {
				return new $name;
			} else {
				return parent::createComponent($name);
			}
		} else {
			return $this->createComponentFrame();
		}
	}
