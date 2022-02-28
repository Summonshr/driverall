<?php

test('Database has seeded data', function () {
    $this->seed();
    // check database has users
    $this->assertDatabaseCount('users',21)->assertDatabaseCount('trips',75)->assertDatabaseCount('offices',15);
});
