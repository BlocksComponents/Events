<?php

	namespace Real\Events;

	class Event
	{
		private $listeners;
		private $callable;

		public function __construct($listeners = null, $callable = null)
		{
			$this->callable = $callable;
			$this->listeners = $listeners;
		}

		public function addListener($name, $func)
		{
			$this->listeners[$name] = $func;
		}

		public function getListeners()
		{
			return $this->listeners;
		}

		public function getCallable()
		{
			return $this->callable;
		}

		public function removeListener($key)
		{
			unset($this->listeners[$key]);
		}
	}