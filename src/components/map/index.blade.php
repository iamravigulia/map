<style>
    table {
        background: #fff;
        width: 100%;
        border: 0;
    }
    th {}
    td {
        border-top: 1px solid #999;
        padding: 5px;
    }
    tr:nth-child(odd) {
        background: #ddd;
    }
</style>
<table>
    <thead>
        <th>#</th>
        <th>Question</th>
        <th>Error</th>
        {{-- <th>Correct</th> --}}
        <th>Created at</th>
        <th>Updated at</th>
    </thead>
    <tbody>
        @php
        $fmt_ques = DB::table('fmt_map_ques')->get();
        @endphp
        @foreach ($fmt_ques as $que)
        <tr>
            <td>{{$que->id}}</td>
            @php $arr_q = explode (",", $que->question); @endphp
            <td>
                @foreach ($arr_q as $aq)
                    @if ($aq == $que->error)
                    <span style="color:rgb(187, 2, 2); text-decoration:underline;">{{$aq}}</span>
                    @else 
                    {{$aq}}
                    @endif
                @endforeach
            </td>
            <td>{{$que->error}}</td>
            {{-- <td>{{$que->correct}}</td> --}}
            <td>{{date('F d, Y',strtotime($que->created_at))}}</td>
            <td>{{date('F d, Y',strtotime($que->updated_at))}}</td>
        </tr>
        <x-map.edit :message="$que->id"/>
        @endforeach
    </tbody>
</table>
<script>
    function modalMap($id){
        var modal = document.getElementById('modalMap'+$id);
        modal.classList.remove("hidden");
    }
    function closeModalMap($id){
        var modal = document.getElementById('modalMap'+$id);
        modal.classList.add("hidden");
    }
</script>