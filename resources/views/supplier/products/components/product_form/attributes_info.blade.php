@php
$product_attributes = [];
if($product){
    $product_attributes = $product->product_attributes;
}
@endphp
<div class="kt-portlet" id="AttributesInfo" style="" >
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">{{__('توابع المنتج')}}</h3>
        </div>
    </div>
    <div class="kt-portlet__body">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label class="col-form-label col-12 font-size-h6 font-weight-bolder text-dark" >
                            <span>{{__("اختر سمة")}}</span>
                            <span class="required">*</span>
                        </label>
                        <div class="kt-input-icon d-flex justify-contenct-between">
                            <select  data-post="{{ $product->ID ?? 0 }}" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6" data-action-name="{{ route('supplier.products.getAttributeSelector') }}" title="{{__('الرجاء تعبئة هذا الحقل')}}"
                                    id="attriubtes"
                                    name="attriubtes">
                                    <option></option>
                                @foreach($attributes as $attribute)
                               
                                <option value="{{ $attribute->term_taxonomy_id }}" >  {{ str_replace('pa_','',$attribute->taxonomy) }}</option>
                               
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div id="loading-attribute-selector" class="mb-15 mt-15 text-center" style="display:none">
                <div class="spinner spinner-primary spinner-lg mr-15" style=""></div>
            </div>
            <div class="row" id="attributes_container">
                 
            </div>
            <div class="form-group">
                <button id='AddAttrBtn' data-post="{{ $product->ID ?? 0 }}" data-author="{{ $product->post_author }}"  class="btn btn-dark " disabled >{{__('اضافة تابع')}}</button>
            </div>
    </div>
</div>
@push('styles')
<link href="{{ asset('/css/typeahead.css') }}" rel="stylesheet">
@endpush
@push('scripts')
<script>
    var form = document.getElementById("ProductFormVariation");
    form.noValidate = true;

// set handler to validate the form
// onsubmit used for easier cross-browser compatibility
  form.onsubmit = validateForm;

function validateForm(event) {

	// fetch cross-browser event object and form node
	event = (event ? event : window.event);
	var
		form = (event.target ? event.target : event.srcElement),
		f, field, formvalid = true;

	// loop all fields

	for (let f = 0; f < form.elements.length; f++) {

		// get field
		field = form.elements[f];
		// ignore buttons, fieldsets, etc.
		if (field.nodeName !== "INPUT" && field.nodeName !== "TEXTAREA" && field.nodeName !== "SELECT") continue;

		// is native browser validation available?
		if (typeof field.willValidate !== "undefined") {

			// native validation available
			// if (field.nodeName === "INPUT" && field.type !== field.getAttribute("type")) {

			// 	// input type not supported! Use legacy JavaScript validation
			// 	field.setCustomValidity(LegacyValidation(field) ? "" : "error");

			// }

			// native browser check
			field.checkValidity();

		}
		else {

			// native validation not available
			field.validity = field.validity || {};

			// set to result of validation function
			field.validity.valid = LegacyValidation(field);

			// if "invalid" events are required, trigger it here

		}

		if (field.validity.valid) {

			// remove error styles and messages

		}
		else {

			// style field, show error, etc.

			// form is invalid
			formvalid = false;
		}

	}

	// cancel form submit if validation fails
	if (!formvalid) {
		if (event.preventDefault) event.preventDefault();
	}
	return formvalid;
}


// basic legacy validation checking
function LegacyValidation(field) {

	var
		valid = true,
		val = field.value,
		type = field.getAttribute("type"),
		chkbox = (type === "checkbox" || type === "radio"),
		required = field.getAttribute("required"),
		minlength = field.getAttribute("minlength"),
		maxlength = field.getAttribute("maxlength"),
		pattern = field.getAttribute("pattern");

	// disabled fields should not be validated
	if (field.disabled) return valid;

    // value required?
	valid = valid && (!required ||
		(chkbox && field.checked) ||
		(!chkbox && val !== "")
	);

	// minlength or maxlength set?
	valid = valid && (chkbox || (
		(!minlength || val.length >= minlength) &&
		(!maxlength || val.length <= maxlength)
	));

	// test pattern
	if (valid && pattern) {
		pattern = new RegExp(pattern);
		valid = pattern.test(val);
	}

	return valid;
}
</script>
    <script>
            let term_modal = `{!! view('supplier.attributes.components.term_modal',['taxonomy_type'=>null,'type'=>'attributes']) !!}`;
           function _initTagsInput(terms){

        }
        $(function(){

            function initializeSelect2(selectElementObj) {
                $(selectElementObj).select2({
                width: "100%",
                tags: true
                });
            }
        // select the target node
        var target = document.getElementById('attributes_container');

        if (target) {
            // create an observer instance
            var observer = new MutationObserver(function(mutations) {
                //loop through the detected mutations(added controls)

                mutations.forEach(function(mutation) {
                //addedNodes contains all detected new controls
                let addedNode = mutation.addedNodes[0]
                if(addedNode!=null || addedNode!=undefined){
                  let  form_group = addedNode.childNodes[1];
                  if(form_group!=null|| form_group!=undefined){
                      let input_grourp = form_group.childNodes[3];
                      if(input_grourp!=null|| input_grourp!=undefined){
                          let newSelect = input_grourp.childNodes[1];
                            initializeSelect2(newSelect);
                            $('.tagsinput-field').select2();
                      }
                  }
                }

                });
            });

            // pass in the target node, as well as the observer options
            observer.observe(target, {
                childList: true
            });

            // later, you can stop observing
            //observer.disconnect();
        }
        function getTaxonomyTerms(term_taxonomy_id){
            let  csrf_token = $('meta[name="csrf-token"]').attr('content');
           $.ajax("/supplier/product/getTaxonomyTerms",
           {
                type:"POST",
                async:true,
                headers: {
                    'X-CSRF-Token': csrf_token
                },
                data:{"term_taxonomy_id":term_taxonomy_id},
                success:function(response){
                    if(response){
                        _initTagsInput(response);
                        $('#loading-attribute-selector').hide();

                    }
                },
                error:function(error){
                   $('#loading-attribute-selector').hide();
                  
                },
            }
           );
        }
        $("#attriubtes").select2();
        $("#attriubtes").on('change',function(){
           let selected_taxonomy = $(this).val();
           let post_ID = $(this).attr('data-post');
           let action = $(this).attr('data-action-name');
           $('#loading-attribute-selector').show();
           let  csrf_token = $('meta[name="csrf-token"]').attr('content');
           $.ajax(action,
           {
                type:"POST",
                async:true,
                headers: {
                    'X-CSRF-Token': csrf_token
                },
                data:{"term_taxonomy_id":selected_taxonomy,'post_id':post_ID},
                success:function(response){
                    if(response){
                        $('#attributes_container').prepend(response);
                        $('#loading-attribute-selector').hide();

                        //$('select').select2();
                        // _initTagsInput([]);
                        //getTaxonomyTerms(selected_taxonomy);
                    }
                },
                error:function(error){
                   $('#loading-attribute-selector').hide();
                  
                },
            }
           );
        });
        $(document).on('click','.add_new_term',function(e){
            let taxonomy_type = $(this).attr('data-taxonomy-type');
            $('body').prepend(term_modal);
            document.getElementById('taxonomy_type').value = taxonomy_type;
            $("#AddTermModal").modal('show');
        })
        $("#ProductFormVariation").on('submit',function(event){
           // event.preventDefault();
            $("#loading-varaiations-form").show();
            formvalid =  validateForm(event);
           
            if(!formvalid){
                $("#loading-varaiations-form").hide();
                toastr.error('{{__("الرجاء التحقق من القيم المدخلة سابقاً قبل حفظ السمات")}}');
                return false;
            }
            return;
        })
        $(document).on('change','.tagsinput-field',function(){
            let selected_option_text = $(this)[0].selectedOptions[0].innerText;
            let selected_option_value = $(this).val();
            $("#variationFormContainer").slideDown();
            $(":input").inputmask();
            //$("#ProductFormVariation").submit();
            $('#AddAttrBtn').prop("disabled", false);
        })
        });


        // By Blaxk

        // Disable AddAttr Button if Validation wrong

        // When Click Add Do ajax Request To Update 
        $(document).on('click','#AddAttrBtn',function(e){

             e.preventDefault()

            
            //Get Requierd Values 
            let post_ID = $(this).attr('data-post');
            let Post_Author = $(this).attr('data-author')
            let AttrArr=$('.tagsinput-field').select2('val')
            let SupplierName=$('input[name=al_supplier_name]').val();
            let PostTitle=$('input[name=post_title]').val();
            let PostContent=$('textarea[name=post_content]').val();
            let Attributes=$('select[name=attriubtes]').val();
            

            AttrArr.forEach(function(element){

                var form = {
                    post_id:post_ID,
                    post_parent:post_ID,
                    post_author:Post_Author,
                    product_type:'variable',
                    supplier_name:SupplierName,
                    post_title:PostTitle,
                    post_content:PostContent,
                    attributes:Attributes,
                    attributes_values:element,
                    _token:"{{csrf_token()}}"
                }


                //Do Request 
                $.ajax({
                    url:"{{ route('AddAttrPost') }}",
                    method:"post",
                    data:form,
                    success:function(resp){

                        //Remove Old Data accordion 
                        $( "#variationsContainer" ).empty();

                        //Display Spinner On Attributes Container 
                        $("#loading-varaiations").show();
                        
                        //Push Success Error
                        toastr.success("{{__('تمت العملية بنجاح')}}");
                        
                        //Fetch New Data
                        $("#variationsContainer").load("{{ route('VariationCard') }}",{'variation':resp.prods,'product':resp.prods[0].ID,'_token':"{{csrf_token()}}"});

                        //Display Spinner On Attributes Container 
                        $("#loading-varaiations").hide();

                    },
                    error:function(xhr){
                        
                        var error = xhr.responseJSON;
                    
                        if(error.message ==='exists'){

                            toastr.error("{{__('المنتج موجود بالفعل')}}");
                        }
                        if(error.message ==='worng'){
                            toastr.error("{{__('لقد حدث خطأ ما , الرجاء المحاولة لاحقاً')}}");
                        }
                    }
                })

           })

        })

    </script>

@endpush
