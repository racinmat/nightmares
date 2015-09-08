//NUM 1
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

//NUM 2
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

//NUM3
//show articles ordered by newest

//this is good
    /**
     * @return array
     */
    public function getFrontArticles()
    {
        return $this->entityRepository->findBy([], ['createdAt' => 'DESC'], 2);
    }


//but this is not....articles are here shown in inverse order....oh my god, just why....

	{if (count($newestEvents) == 0)}
		<div class="widget" n:for="$i = 1; $i >= 0; $i--">
			<h4 class="widget-head">
				<i class="icon icon-novinka"></i> Článek
			</h4>
			<div class="widget-content">
				<h3><a n:href="Articles:detail, $frontArticles[$i]->id">{$frontArticles[$i]->name}</a></h3>
                   <p>{$frontArticles[$i]->description}</p>
				<p class="widget-date"><i class="icon icon-calendar"></i>{$frontArticles[$i]->createdAt|date:"d. m. y"}</p>
			</div>
		</div>
	{/if}
