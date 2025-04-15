@props(['model', 'placeholder'])
<div x-data="{
    formatToBrl(value) {
            value = value.replace(/\D/g, '');
            value = (value / 100).toFixed(2) + '';
            value = value.replace('.', ',');
            value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            return value;
        },
        unformat(value) {
            value = value.replace(/\./g, '').replace(',', '.');
            return value;
        },
        visibleValue: '',
        updateValue(event) {
            let input = event.target.value;
            this.visibleValue = this.formatToBrl(input);
            $wire.value = this.unformat(this.visibleValue);
        }
}">
    <x-ts-input type="text" wire:model="{{$model}}" x-model="visibleValue" @input="updateValue" placeholder="{{$placeholder}}" />
</div>
