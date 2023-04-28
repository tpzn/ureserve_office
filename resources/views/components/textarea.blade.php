@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>{{ $slot }}</textarea>
{{-- <div class="float-left">
  <div id="controller">
    <div>テキストを選択して下のボタンを押してね</div>
    <ul>
    <li class="list-none"><button onclick="document.execCommand('bold');">ボールドにする</button></li>
    <li class="list-none"><button onclick="document.execCommand('italic');">italicにする</button></li>
    <li class="list-none"><button onclick="document.execCommand('formatBlock', false, '<h1>')">h1にする</button></li>
    <li class="list-none"><button onclick="document.execCommand('foreColor', false, '#e51c23');">赤にする</button></li>
    <li class="list-none"><button onclick="document.execCommand('foreColor', false, '#ffc107');">黄色にする</button></li>
    <li class="list-none"><button onclick="document.execCommand('foreColor', false, '#009688');">緑にする</button></li>
    <li class="list-none"><button onclick="document.execCommand('foreColor', false, '#03a9f4');">青にする</button></li>
  </ul>
  </div>
  </div> --}}
  {{-- <div wire:submit.prevent="save" class="border border-s-4">
<div contenteditable=true wire:model.lazy="information">記事を入力してください{{ $slot }}</div>
</div> --}}