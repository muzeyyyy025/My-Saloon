<?php

namespace App\Filament\Resources\Customers\Pages;

use App\Filament\Resources\Customers\CustomerResource;
use Filament\Resources\Pages\CreateRecord;
use App\Jobs\AppointmentRemainderJob;
class CreateCustomer extends CreateRecord
{
    protected static string $resource = CustomerResource::class;

protected function afterCreate(): void
{
    AppointmentRemainderJob::dispatch($this->record->id);
}
}