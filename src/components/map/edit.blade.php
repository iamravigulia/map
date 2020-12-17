<!--
  Tailwind UI components require Tailwind CSS v1.8 and the @tailwindcss/ui plugin.
  Read the documentation to get started: https://tailwindui.com/documentation
-->
<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
@php $que = DB::table('fmt_map_ques')->where('id', $message)->first(); @endphp
<div class="fixed z-10 inset-0 overflow-y-auto hidden" id="modalMAP{{$que->id}}">
    
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!--
        Background overlay, show/hide based on modal state.
  
        Entering: "ease-out duration-300"
          From: "opacity-0"
          To: "opacity-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100"
          To: "opacity-0"
      -->
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>&#8203;
        <!--
        Modal panel, show/hide based on modal state.
  
        Entering: "ease-out duration-300"
          From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          To: "opacity-100 translate-y-0 sm:scale-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100 translate-y-0 sm:scale-100"
          To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
      -->
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full relative -mx-8" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <a onclick="closeModalMAP({{$message}})" class="p-2 bg-white w-8 h-8 bg-gray-600 text-white rounded-full absolute right-0 -top-10 -mr-2 -mt-2 z-40" href="javascript:void(0);">x</a>
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <form action="{{route('fmt.map.update', $que->id)}}" method="post">
                    @if ($errors ?? '')
                        <div class="my-4">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                    @csrf
                    <div class="text-xl">Edit MAP Question {{$message}}</div>
                    <div>
                        <label class="fmt_label" for="">Paragraph</label>
                        <textarea class="fmt_input" name="paragraph" id="paragraphInput" cols="30" rows="6"
                            placeholder="Paragraph"></textarea>
                    </div>
                    <div class="my-2">
                        <label class="bloc" for="">Difficulty Level</label>
                        @php $d_levels = DB::table('difficulty_levels')->get(); @endphp
                        <select name="difficulty_level_id" id="" class="w-full my-2 px-2 py-2 border border-gray-500 rounded-lg">
                            @if ($que->difficulty_level_id)
                                @php $mylevel = DB::table('difficulty_levels')->where('id', $que->difficulty_level_id)->first(); @endphp
                                    <option value="{{$mylevel->id}}">{{$mylevel->name}}</option>
                                @foreach ($d_levels as $level)
                                    @if ($level->id == $mylevel->id)
                    
                                    @else
                                        <option value="{{$level->id}}">{{$level->name}}</option>
                                    @endif
                                @endforeach
                            @else
                                @foreach ($d_levels as $level)
                                    <option value="{{$level->id}}">{{$level->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div style="margin:20px 0;" id="radioBoxXO">
        
                    </div>
                    <div style="margin:20px 0;" id="correct_input">
        
                    </div>
                    <button id="splitBtnZOXO" style="padding:6px 20px; margin:0px 10px; cursor:pointer; border-radius:8px; background:#00974c; color:rgb(255, 255, 255); letter-spacing:1px;">SPLIT</button>
                    <button class="my-2 py-1 px-2 bg-blue-600 text-white rounded-lg" type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>