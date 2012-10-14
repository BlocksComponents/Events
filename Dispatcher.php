<?php

	namespace Real\Events;

	class Dispatcher
	{
		private $events;

		public function fire($event)
		{
			$name = $event;
			$event = $this->events[$event];
			$listeners = $event->getListeners();
			$callable = $event->getCallable();

			foreach ($listeners as $listener) {
				$listener->$name();
			}

			call_user_func($callable);

			return $event;
		}

		public function addEvent($name, $event)
		{
			if (!$event instanceOf Event) {
				$event = call_user_func($event);
			} 

			$this->events[$name] = $event;
		}
	}