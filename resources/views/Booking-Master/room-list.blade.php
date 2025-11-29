<div class="col-lg-9">
    <div class="row">

        @php
        $seats = ['1S','2S','3S','4S','5S','6S','7S','8S','9S','10S',
                  '11S','12S','13S','14S','15S','16S','17S','18S','19S','20S'];
        $i = 1;
        @endphp

        @foreach($seats as $seat)

            {{-- First Floor (1S–10S) --}}
            @if($i <= 10)
                <div class="col-lg-1" style="margin-left:15px">
                    <div class="avatar-md 
                        {{ in_array($seat, $bookedSeats) ? 'bg-soft-success' : 'bg-soft-primary' }}
                        rounded text-align-center"
                        @if(!in_array($seat, $bookedSeats))
                        data-bs-toggle="modal"
                        data-bs-target="#exampleModal"
                        @endif
                        data-id="{{ $seat }}">
                        <h5 style="line-height: 55px;margin-left:10px;">{{ $seat }}</h5>
                    </div>
                    <br>
                </div>

                {{-- Insert 2nd Floor heading after 10th seat --}}
                @if($i == 10)
                    <div style="width:100%;background-color:#867a80;padding:15px;">
                        <h4 style="color:aliceblue">2nd Floor</h4>
                    </div>
                @endif

            {{-- Second Floor (11S–20S) --}}
            @else
                <div class="col-lg-1" style="margin-left:15px;margin-top:15px;">
                    <div class="avatar-md 
                        {{ in_array($seat, $bookedSeats) ? 'bg-soft-success' : 'bg-soft-primary' }}
                        rounded text-align-center"
                        @if(!in_array($seat, $bookedSeats))
                        data-bs-toggle="modal"
                        data-bs-target="#exampleModal"
                        @endif
                        data-id="{{ $seat }}">
                        <h5 style="line-height: 55px;margin-left:10px;">{{ $seat }}</h5>
                    </div>
                    <br>
                </div>
            @endif

            {{-- ALWAYS increment seat counter --}}
            @php $i++; @endphp

        @endforeach
    </div>
</div>
