@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<span class="text-dark">Real</span><span style="color: #2eca6a">State</span>
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
