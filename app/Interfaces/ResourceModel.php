<?php

namespace App\Interfaces;

interface ResourceModel {
    public function createWith(array $data);

    public function update(array $data);

    public function attachTags(array $tags);

    public function detachTags(array $tags);

    public function delete();
}
