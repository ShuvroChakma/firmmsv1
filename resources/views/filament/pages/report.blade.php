<x-filament::page>

<x-filament::card>
    <form action="" wire:submit.prevent="report">
<select class="" name="" wire:model="type" id="">
    <option value="all">All</option>
    <option value="expenses">Expenses</option>
    <option value="gain">Gain</option>
</select>



<select name="" wire:model="detail" id="">
    <option value="detailed">Detailed</option>
    <option value="short">short</option>
</select>
<input type="date" name="" wire:model="from" id="">
<input type="date" name="" wire:model="to" id="">

<x-filament-support::button type="submit">
    Submit
</x-filament-support::button>
</form>
</x-filament::card>

@if ($table)
<x-filament::card>
    {!! $table !!}
</x-filament::card>
@endif

</x-filament::page>
