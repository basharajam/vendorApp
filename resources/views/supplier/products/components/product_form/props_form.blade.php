



<div class="row">


    <table>

        <tbody class='PropsContainer PropsContainer{{$where}}'>



            {{-- @foreach ($props as $prop)
            <tr>

                <td>
                   <input class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6  " type="text"  name="_propName{{$prop['id']}}{{$where}}" value="{{ $prop['PropName'] }}"   disabled />
                   
                </td>
                <td>
                    <input class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 " type="text"  name="_propVal{{$prop['id']}}{{$where}}" value="{{ $prop['PropValue'] }}"   title="{{__('الرجاء تعبئة هذا الحقل')}}"/>
                </td>
                <td>
                    <button class="btn 
                    @if ( $prop['PropStatus'] === 0)
                        btn-success
                    @endif
                    @if ( $prop['PropStatus'] === 1)
                         btn-primary
                    @endif
                     h-auto py-3 px-4 rounded-lg font-size-h6 StatusPropBtn statusBtn{{$prop['id']}}" data-prop="{{ $prop['id'] }}" data-status='{{ $prop['PropStatus'] }}'><i class="fa fa-fw fa-eye" ></i></button>
                    
                </td>
            </tr>
            @endforeach --}}
    
        </tbody>
    </table>

</div>
