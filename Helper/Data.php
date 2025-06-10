<?php

namespace Navin\BugBotDemo\Helper;

class Data extends AbstractHelper
{
    public function __construct(
        Context $context
    ){
        parent::__construct($context);
    }

    protected function getStore()
    {
        return array("Store 1", "Store 2", "Store 3");
    }

}