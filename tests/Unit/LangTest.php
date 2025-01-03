<?php

use App\Lang\Lang;
it('can get english language', function () {
    expect(Lang::from('de')->label())->toBe('Deutsch');
});
