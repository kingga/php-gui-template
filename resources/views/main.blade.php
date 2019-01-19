<use class="Gui\Components\Div"></use>
<use class="Gui\Components\Button"></use>
<use class="Gui\Components\Label"></use>

<Div width="275" height="205" left="180" top="120">
    <Label fontSize="24" fontColor="#000" left="20" top="20">{{ env('APP_TITLE') }}</Label>
    
    @php ($y = 60)
    @foreach ($info as $name => $value)
        <Label fontSize="11" left="20" top="{{ $y }}">{{ $name }}: {{ $value }}</Label>
        @php ($y += 20)
    @endforeach

    <Button width="235" onclick="closeApplication" left="20" top="{{ $y + 20 }}">Close</Button>
</Div>