<div>
    <style>
        .fmt_box {
            margin: 20px 20px;
            padding: 10px 20px;
            border: 4px solid #eeeeee;
            background: #fff;
            box-shadow: 2px 4px 8px #b1b1b1;
        }

        .fmt_headline {
            font-size: 20px;
            margin: 10px 0;
        }

        .fmt_label {
            font-size: 14px;
        }

        .fmt_input {
            width: 100%;
            padding: 4px 10px;
            border: 1px solid #707070;
            border-radius: 4px;
            display: block;
            font-size: 16px;
        }

        .fmt_sub_btn {
            padding: 6px 20px;
            margin: 10px 0;
            border-radius: 8px;
            background: #0047d4;
            color: #fff;
            border: none;
            letter-spacing: 1px;
            cursor: pointer;
        }

        .fmt_checkbox {
            width: 22px;
            height: 22px;
            display: block;
        }

        .fmt_flex {
            display: flex;
            margin: 10px 0;
        }

        #addOption {
            padding: 6px 20px;
            background: #049e04;
            color: #fff;
            cursor: pointer;
        }

    </style>
    <div class="fmt_box">
        <form action="{{route('fmt.map.store')}}" method="post" enctype="multipart/form-data">
            <input type="integer" name="problem_set_id" value="{{$pbs72 ?? ''}}" hidden style="border:1px solid #000000;">
            <input type="integer" name="format_type_id" value="{{$fmt72 ?? ''}}" hidden style="border:1px solid #000000;">
            <div class="fmt_headline">Add a "Mark the error in paragraph"</div>
            <div>
                <label class="fmt_label" for="">Paragraph</label>
                <textarea class="fmt_input" name="paragraph" id="paragraphInput" cols="30" rows="6"
                    placeholder="Paragraph"></textarea>
            </div>
            <div class="my-2" style="margin: 20px 0;">
                <label class="bloc" for="">Difficulty Level</label>
                @php $d_levels = DB::table('difficulty_levels')->get(); @endphp
                <select name="difficulty_level_id" id="" class="w-full my-2 px-2 py-2 border border-gray-500 rounded-lg">
                    @foreach ($d_levels as $level)
                    <option value="{{$level->id}}">{{$level->name}}</option>
                    @endforeach
                </select>
            </div>
            <div style="margin:20px 0;" id="radioBoxXO">

            </div>
            <div style="margin:20px 0;" id="correct_input">

            </div>
            <div>
                <input type="submit" id="subBtn" class="fmt_sub_btn" value="Submit">
            </div>
        </form>
        <button id="splitBtnZOX" style="padding:6px 20px; margin:0px 10px; cursor:pointer; border-radius:8px; background:#00974c; color:rgb(255, 255, 255); letter-spacing:1px;">SPLIT</button>
    </div>
    {{-- <button id="addOption">Add option</button> --}}
</div>
<script>
    var splitBtnZOX = document.getElementById('splitBtnZOX');
    var paragraphInput = document.getElementById('paragraphInput');
    var radioBoxXo = document.getElementById('radioBoxXO');
    var correct_input = document.getElementById('correct_input');
    var subBtn = document.getElementById('subBtn');
    correct_input.style.display = "none";
    subBtn.style.display = "none";
    splitBtnZOX.addEventListener('click', function () {
        var str = paragraphInput.value;
        str = str.split(' ');
        paragraphInput.value = str;
        console.log(str);
        var inRadio = "";
        str.forEach(element => {
            inRadio += "<input type='radio' name='error' value='" + element + "'>";
            inRadio += "<label for='" + element + "'>" + element + "</label><br>";
        });
        console.log(inRadio);
        radioBoxXo.innerHTML = inRadio;
        
        correct_input.style.display = "block";
        subBtn.style.display = "block";
        splitBtnZOX.style.display = "none";
    });

</script>
