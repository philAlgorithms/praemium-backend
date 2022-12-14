@props(['url'])
<tr>
    <td class="header">
        <span style="display: inline-block;">
            <img src="{{ env('APP_ENV') === 'local' ? 'https://praemium.com/static/img/logo.svg' : URL::to('/static/img/logo.svg') }}" class="logo" alt="Metabinance">
        </span>
    </td>
</tr>
    
