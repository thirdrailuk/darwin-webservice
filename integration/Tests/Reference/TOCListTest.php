<?php

namespace Tests\Reference;

use PHPUnit\Framework\TestCase;

class TOCList extends TestCase
{
    public function test_it_can_get_a_list_of_train_operating_companies()
    {
        $tocList = clientFactory()->getTOCList();

        $this->assertObjectHasAttribute('GetTOCListResult', $tocList);
        $this->assertObjectHasAttribute('TOCList', $tocList->GetTOCListResult);
        $this->assertObjectHasAttribute('TOC', $tocList->GetTOCListResult->TOCList);

        $this->assertGreaterThan(0, count($tocList->GetTOCListResult->TOCList->TOC));
    }
}