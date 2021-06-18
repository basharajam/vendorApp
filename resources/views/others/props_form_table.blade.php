
@if (!empty($props))
    
    @foreach ($props as $prop)
    <tr>

        <td>
        <input class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6  " type="text"  name="_propName{{$prop['id']}}{{$where}}" value="{{ $prop['PropName'] }}"   disabled />
        
        </td>
        <td>
            <input class="form-control UpdValI h-auto py-7 px-6 rounded-lg font-size-h6 " type="text"  name="_propVal{{$prop['id']}}{{$where}}" value="{{ $prop['PropValue'] }}" data-prop="{{ $prop['id'] }}" data-cat="{{ $prop['PropCatId'] }}" data-where="{{ $where }}" data-status="{{ $prop['PropStatus'] }}"  title="{{__('الرجاء تعبئة هذا الحقل')}}" />
        </td>
        <td>
            <button class="btn 

            @php
                if( $prop['PropStatus'] == 0){
                    echo 'btnUnCheckd';
                }
                else{
                    echo 'btnCheckd';
                }
            @endphp
            h-auto py-3 px-4 rounded-lg font-size-h6 StatusPropBtn statusBtn{{$prop['id']}}" data-prop="{{ $prop['id'] }}" data-status='{{ $prop['PropStatus'] }}'>
            @php
            if( $prop['PropStatus'] == 0){
                
            }
            else{
              echo "<i style='color:green' class='fa fa-check' aria-hidden='true'></i>";
            }
        @endphp
  

            </button>
            @if (!empty($prop['meta']))
            @foreach ($prop['meta'] as $meta)
        
                @if (!empty($product))
                    @if (  $meta['post_id'] === $product->ID && $meta['meta_key'] === $prop['PropName'])
                        <button class="btn btn-danger DelMetaBtn" data-where="{{$where}}" data-meta="{{$meta['meta_id']}}" data-where='{{$where}}'></button>
                    @endif
                @endif

            @endforeach
            @endif

            {{-- <button class="btn btn-warning h-auto py-4 px-4 rounded-lg font-size-h6 UpdatePropBtn" data-prop="{{ $prop['id'] }}" data-cat="{{ $prop['PropCatId'] }}" data-where="{{$where}}" ><i class="flaticon-edit-1"></i></button> --}}
               </td>
             </tr>
             @endforeach
@endif
