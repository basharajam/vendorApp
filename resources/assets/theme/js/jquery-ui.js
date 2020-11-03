
(function ($) {
  'use strict';
  /**
   * We need an event when the elements are destroyed
   * because if an input is removed, we have to remove the
   * maxlength object associated (if any).
   * From:
   * http://stackoverflow.com/questions/2200494/jquery-trigger-event-when-an-element-is-removed-from-the-dom
   */
  if (!$.event.special.destroyed) {
    $.event.special.destroyed = {
      remove: function (o) {
        if (o.handler) {
          o.handler();
        }
      }
    };
  }


  $.fn.extend({
    maxlength: function (options, callback) {
      var documentBody = $('body'),
        defaults = {
          showOnReady: false, // true to always show when indicator is ready
          alwaysShow: false, // if true the indicator it's always shown.
          threshold: 10, // Represents how many chars left are needed to show up the counter
          warningClass: 'label label-success',
          limitReachedClass: 'label label-important label-danger',
          separator: ' / ',
          preText: '',
          postText: '',
          showMaxLength: true,
          placement: 'bottom',
          message: null, // an alternative way to provide the message text
          showCharsTyped: true, // show the number of characters typed and not the number of characters remaining
          validate: false, // if the browser doesn't support the maxlength attribute, attempt to type more than
          // the indicated chars, will be prevented.
          utf8: false, // counts using bytesize rather than length. eg: '£' is counted as 2 characters.
          appendToParent: false, // append the indicator to the input field's parent instead of body
          twoCharLinebreak: true,  // count linebreak as 2 characters to match IE/Chrome textarea validation. As well as DB storage.
          allowOverMax: false  // false = use maxlength attribute and browswer functionality.
          // true = removes maxlength attribute and replaces with 'data-bs-mxl'.
          // Form submit validation is handled on your own.  when maxlength has been exceeded 'overmax' class added to element
        };

      if ($.isFunction(options) && !callback) {
        callback = options;
        options = {};
      }
      options = $.extend(defaults, options);

      /**
      * Return the length of the specified input.
      *
      * @param input
      * @return {number}
      */
      function inputLength(input) {
        var text = input.val();

        if (options.twoCharLinebreak) {
          // Count all line breaks as 2 characters
          text = text.replace(/\r(?!\n)|\n(?!\r)/g, '\r\n');
        } else {
          // Remove all double-character (\r\n) linebreaks, so they're counted only once.
          text = text.replace(new RegExp('\r?\n', 'g'), '\n');
        }

        var currentLength = 0;

        if (options.utf8) {
          currentLength = utf8Length(text);
        } else {
          currentLength = text.length;
        }
        return currentLength;
      }

      /**
      * Truncate the text of the specified input.
      *
      * @param input
      * @param limit
      */
      function truncateChars(input, maxlength) {
        var text = input.val();
        var newlines = 0;

        if (options.twoCharLinebreak) {
          text = text.replace(/\r(?!\n)|\n(?!\r)/g, '\r\n');

          if (text.substr(text.length - 1) === '\n' && text.length % 2 === 1) {
            newlines = 1;
          }
        }

        input.val(text.substr(0, maxlength - newlines));
      }

      /**
      * Return the length of the specified input in UTF8 encoding.
      *
      * @param input
      * @return {number}
      */
      function utf8Length(string) {
        var utf8length = 0;
        for (var n = 0; n < string.length; n++) {
          var c = string.charCodeAt(n);
          if (c < 128) {
            utf8length++;
          }
          else if ((c > 127) && (c < 2048)) {
            utf8length = utf8length + 2;
          }
          else {
            utf8length = utf8length + 3;
          }
        }
        return utf8length;
      }

      /**
       * Return true if the indicator should be showing up.
       *
       * @param input
       * @param thereshold
       * @param maxlength
       * @return {number}
       */
      function charsLeftThreshold(input, thereshold, maxlength) {
        var output = true;
        if (!options.alwaysShow && (maxlength - inputLength(input) > thereshold)) {
          output = false;
        }
        return output;
      }

      /**
       * Returns how many chars are left to complete the fill up of the form.
       *
       * @param input
       * @param maxlength
       * @return {number}
       */
      function remainingChars(input, maxlength) {
        var length = maxlength - inputLength(input);
        return length;
      }

      /**
       * When called displays the indicator.
       *
       * @param indicator
       */
      function showRemaining(currentInput, indicator) {
        indicator.css({
          display: 'block'
        });
        currentInput.trigger('maxlength.shown');
      }

      /**
       * When called shows the indicator.
       *
       * @param indicator
       */
      function hideRemaining(currentInput, indicator) {
        indicator.css({
          display: 'none'
        });
        currentInput.trigger('maxlength.hidden');
      }

      /**
      * This function updates the value in the indicator
      *
      * @param maxLengthThisInput
      * @param typedChars
      * @return String
      */
      function updateMaxLengthHTML(currentInputText, maxLengthThisInput, typedChars) {
        var output = '';
        if (options.message) {
          if (typeof options.message === 'function') {
            output = options.message(currentInputText, maxLengthThisInput);
          } else {
            output = options.message.replace('%charsTyped%', typedChars)
              .replace('%charsRemaining%', maxLengthThisInput - typedChars)
              .replace('%charsTotal%', maxLengthThisInput);
          }
        } else {
          if (options.preText) {
            output += options.preText;
          }
          if (!options.showCharsTyped) {
            output += maxLengthThisInput - typedChars;
          }
          else {
            output += typedChars;
          }
          if (options.showMaxLength) {
            output += options.separator + maxLengthThisInput;
          }
          if (options.postText) {
            output += options.postText;
          }
        }
        return output;
      }

      /**
       * This function updates the value of the counter in the indicator.
       * Wants as parameters: the number of remaining chars, the element currently managed,
       * the maxLength for the current input and the indicator generated for it.
       *
       * @param remaining
       * @param currentInput
       * @param maxLengthCurrentInput
       * @param maxLengthIndicator
       */
      function manageRemainingVisibility(remaining, currentInput, maxLengthCurrentInput, maxLengthIndicator) {
        if (maxLengthIndicator) {
          maxLengthIndicator.html(updateMaxLengthHTML(currentInput.val(), maxLengthCurrentInput, (maxLengthCurrentInput - remaining)));

          if (remaining > 0) {
            if (charsLeftThreshold(currentInput, options.threshold, maxLengthCurrentInput)) {
              showRemaining(currentInput, maxLengthIndicator.removeClass(options.limitReachedClass).addClass(options.warningClass));
            } else {
              hideRemaining(currentInput, maxLengthIndicator);
            }
          } else {
            showRemaining(currentInput, maxLengthIndicator.removeClass(options.warningClass).addClass(options.limitReachedClass));
          }
        }

        if (options.allowOverMax) {
          // class to use for form validation on custom maxlength attribute
          if (remaining < 0) {
            currentInput.addClass('overmax');
          } else {
            currentInput.removeClass('overmax');
          }
        }
      }

      /**
       * This function returns an object containing all the
       * informations about the position of the current input
       *
       * @param currentInput
       * @return object {bottom height left right top width}
       *
       */
      function getPosition(currentInput) {
        var el = currentInput[0];
        return $.extend({}, (typeof el.getBoundingClientRect === 'function') ? el.getBoundingClientRect() : {
          width: el.offsetWidth,
          height: el.offsetHeight
        }, currentInput.offset());
      }

      /**
       * This function places the maxLengthIndicator at the
       * top / bottom / left / right of the currentInput
       *
       * @param currentInput
       * @param maxLengthIndicator
       * @return null
       *
       */
      function place(currentInput, maxLengthIndicator) {
        var pos = getPosition(currentInput);

        // Supports custom placement handler
        if ($.type(options.placement) === 'function'){
          options.placement(currentInput, maxLengthIndicator, pos);
          return;
        }

        // Supports custom placement via css positional properties
        if ($.isPlainObject(options.placement)){
          placeWithCSS(options.placement, maxLengthIndicator);
          return;
        }

        var inputOuter = currentInput.outerWidth(),
          outerWidth = maxLengthIndicator.outerWidth(),
          actualWidth = maxLengthIndicator.width(),
          actualHeight = maxLengthIndicator.height();

        // get the right position if the indicator is appended to the input's parent
        if (options.appendToParent) {
          pos.top -= currentInput.parent().offset().top;
          pos.left -= currentInput.parent().offset().left;
        }

        switch (options.placement) {
          case 'bottom':
            maxLengthIndicator.css({ top: pos.top + pos.height, left: pos.left + pos.width / 2 - actualWidth / 2 });
            break;
          case 'top':
            maxLengthIndicator.css({ top: pos.top - actualHeight, left: pos.left + pos.width / 2 - actualWidth / 2 });
            break;
          case 'left':
            maxLengthIndicator.css({ top: pos.top + pos.height / 2 - actualHeight / 2, left: pos.left - actualWidth });
            break;
          case 'right':
            maxLengthIndicator.css({ top: pos.top + pos.height / 2 - actualHeight / 2, left: pos.left + pos.width });
            break;
          case 'bottom-right':
            maxLengthIndicator.css({ top: pos.top + pos.height, left: pos.left + pos.width });
            break;
          case 'top-right':
            maxLengthIndicator.css({ top: pos.top - actualHeight, left: pos.left + inputOuter });
            break;
          case 'top-left':
            maxLengthIndicator.css({ top: pos.top - actualHeight, left: pos.left - outerWidth });
            break;
          case 'bottom-left':
            maxLengthIndicator.css({ top: pos.top + currentInput.outerHeight(), left: pos.left - outerWidth });
            break;
          case 'centered-right':
            maxLengthIndicator.css({ top: pos.top + (actualHeight / 2), left: pos.left + inputOuter - outerWidth - 3 });
            break;

            // Some more options for placements
          case 'bottom-right-inside':
            maxLengthIndicator.css({ top: pos.top + pos.height, left: pos.left + pos.width - outerWidth });
            break;
          case 'top-right-inside':
            maxLengthIndicator.css({ top: pos.top - actualHeight, left: pos.left + inputOuter - outerWidth });
            break;
          case 'top-left-inside':
            maxLengthIndicator.css({ top: pos.top - actualHeight, left: pos.left });
            break;
          case 'bottom-left-inside':
            maxLengthIndicator.css({ top: pos.top + currentInput.outerHeight(), left: pos.left });
            break;
        }
      }

      /**
       * This function places the maxLengthIndicator based on placement config object.
       *
       * @param {object} placement
       * @param {$} maxLengthIndicator
       * @return null
       *
       */
      function placeWithCSS(placement, maxLengthIndicator) {
        if (!placement || !maxLengthIndicator){
          return;
        }

        var POSITION_KEYS = [
          'top',
          'bottom',
          'left',
          'right',
          'position'
        ];

        var cssPos = {};

        // filter css properties to position
        $.each(POSITION_KEYS, function (i, key) {
          var val = options.placement[key];
          if (typeof val !== 'undefined'){
            cssPos[key] = val;
          }
        });

        maxLengthIndicator.css(cssPos);

        return;
      }

      /**
       * This function retrieves the maximum length of currentInput
       *
       * @param currentInput
       * @return {number}
       *
       */
      function getMaxLength(currentInput) {
        var attr = 'maxlength';
        if (options.allowOverMax) {
          attr = 'data-bs-mxl';
        }
        return currentInput.attr(attr) || currentInput.attr('size');
      }

      return this.each(function () {

        var currentInput = $(this),
          maxLengthCurrentInput,
          maxLengthIndicator;

        $(window).resize(function () {
          if (maxLengthIndicator) {
            place(currentInput, maxLengthIndicator);
          }
        });

        if (options.allowOverMax) {
          $(this).attr('data-bs-mxl', $(this).attr('maxlength'));
          $(this).removeAttr('maxlength');
        }

        function firstInit() {
          var maxlengthContent = updateMaxLengthHTML(currentInput.val(), maxLengthCurrentInput, '0');
          maxLengthCurrentInput = getMaxLength(currentInput);

          if (!maxLengthIndicator) {
            maxLengthIndicator = $('<span class="bootstrap-maxlength"></span>').css({
              display: 'none',
              position: 'absolute',
              whiteSpace: 'nowrap',
              zIndex: 1099
            }).html(maxlengthContent);
          }

          // We need to detect resizes if we are dealing with a textarea:
          if (currentInput.is('textarea')) {
            currentInput.data('maxlenghtsizex', currentInput.outerWidth());
            currentInput.data('maxlenghtsizey', currentInput.outerHeight());

            currentInput.mouseup(function () {
              if (currentInput.outerWidth() !== currentInput.data('maxlenghtsizex') || currentInput.outerHeight() !== currentInput.data('maxlenghtsizey')) {
                place(currentInput, maxLengthIndicator);
              }

              currentInput.data('maxlenghtsizex', currentInput.outerWidth());
              currentInput.data('maxlenghtsizey', currentInput.outerHeight());
            });
          }

          if (options.appendToParent) {
            currentInput.parent().append(maxLengthIndicator);
            currentInput.parent().css('position', 'relative');
          } else {
            documentBody.append(maxLengthIndicator);
          }

          var remaining = remainingChars(currentInput, getMaxLength(currentInput));
          manageRemainingVisibility(remaining, currentInput, maxLengthCurrentInput, maxLengthIndicator);
          place(currentInput, maxLengthIndicator);
        }

        if (options.showOnReady) {
          currentInput.ready(function () {
            firstInit();
          });
        } else {
          currentInput.focus(function () {
            firstInit();
          });
        }

        currentInput.on('maxlength.reposition', function () {
          place(currentInput, maxLengthIndicator);
        });


        currentInput.on('destroyed', function () {
          if (maxLengthIndicator) {
            maxLengthIndicator.remove();
          }
        });

        currentInput.on('blur', function () {
          if (maxLengthIndicator && !options.showOnReady) {
            maxLengthIndicator.remove();
          }
        });

        currentInput.on('input', function () {
          var maxlength = getMaxLength(currentInput),
            remaining = remainingChars(currentInput, maxlength),
            output = true;

          if (options.validate && remaining < 0) {
            truncateChars(currentInput, maxlength);
            output = false;
          } else {
            manageRemainingVisibility(remaining, currentInput, maxLengthCurrentInput, maxLengthIndicator);
          }

          //reposition the indicator if placement "bottom-right-inside" & "top-right-inside" is used
          if (options.placement === 'bottom-right-inside' || options.placement === 'top-right-inside') {
            place(currentInput, maxLengthIndicator);
          }

          return output;
        });
      });
    }
  });
}(jQuery));

+function(a){"use strict";function c(c){return this.each(function(){var d=a(this),e=d.data("multiselectsplitter"),f="object"==typeof c&&c;(e||"destroy"!=c)&&(e||d.data("multiselectsplitter",e=new b(this,f)),"string"==typeof c&&e[c]())})}var b=function(a,b){this.init("multiselectsplitter",a,b)};b.DEFAULTS={selectSize:null,maxSelectSize:null,clearOnFirstChange:!1,onlySameGroup:!1,groupCounter:!1,maximumSelected:null,afterInitialize:null,maximumAlert:function(a){alert("Only "+a+" values can be selected")},createFirstSelect:function(a,b){return"<option>"+a+"</option>"},createSecondSelect:function(a,b){return"<option>"+a+"</option>"},template:'<div class="row" data-multiselectsplitter-wrapper-selector><div class="col-xs-6 col-sm-6"><select class="form-control" data-multiselectsplitter-firstselect-selector></select></div> <!-- Add the extra clearfix for only the required viewport --><div class="col-xs-6 col-sm-6"><select class="form-control" data-multiselectsplitter-secondselect-selector></select></div></div>'},b.prototype.init=function(c,d,e){var f=this;f.type=c,f.last$ElementSelected=[],f.initialized=!1,f.$element=a(d),f.$element.hide(),f.options=a.extend({},b.DEFAULTS,e),f.$element.after(f.options.template),f.$wrapper=f.$element.next("div[data-multiselectsplitter-wrapper-selector]"),f.$firstSelect=a("select[data-multiselectsplitter-firstselect-selector]",f.$wrapper),f.$secondSelect=a("select[data-multiselectsplitter-secondselect-selector]",f.$wrapper);var g=0,h=0;if(0!=f.$element.find("optgroup").length){f.$element.find("optgroup").each(function(){var b=a(this).attr("label"),c=a(f.options.createFirstSelect(b,f.$element));c.val(b),c.attr("data-current-label",c.text()),f.$firstSelect.append(c);var d=a(this).find("option").length;d>h&&(h=d),g++});var i=Math.max(g,h);i=Math.min(i,10),f.options.selectSize?i=f.options.selectSize:f.options.maxSelectSize&&(i=Math.min(i,f.options.maxSelectSize)),f.$firstSelect.attr("size",i),f.$secondSelect.attr("size",i),f.$element.attr("multiple")&&f.$secondSelect.attr("multiple","multiple"),f.$element.is(":disabled")&&f.disable(),f.$firstSelect.on("change",a.proxy(f.updateParentCategory,f)),f.$secondSelect.on("click change",a.proxy(f.updateChildCategory,f)),f.update=function(){if(!(f.$element.find("option").length<1)){var b,a=f.$element.find("option:selected:first");b=a.length?a.parent().attr("label"):f.$element.find("option:first").parent().attr("label"),f.$firstSelect.find('option[value="'+b+'"]').prop("selected",!0),f.$firstSelect.trigger("change")}},f.update(),f.initialized=!0,f.options.afterInitialize&&f.options.afterInitialize(f.$firstSelect,f.$secondSelect)}},b.prototype.disable=function(){this.$secondSelect.prop("disabled",!0),this.$firstSelect.prop("disabled",!0)},b.prototype.enable=function(){this.$secondSelect.prop("disabled",!1),this.$firstSelect.prop("disabled",!1)},b.prototype.createSecondSelect=function(){var b=this;b.$secondSelect.empty(),a.each(b.$element.find('optgroup[label="'+b.$firstSelect.val()+'"] option'),function(c,d){var e=a(this).val(),f=a(this).text(),g=a(b.options.createSecondSelect(f,b.$firstSelect));g.val(e),a.each(b.$element.find("option:selected"),function(b,c){a(c).val()==e&&g.prop("selected",!0)}),b.$secondSelect.append(g)})},b.prototype.updateParentCategory=function(){var a=this;a.last$ElementSelected=a.$element.find("option:selected"),a.options.clearOnFirstChange&&a.initialized&&a.$element.find("option:selected").prop("selected",!1),a.createSecondSelect(),a.checkSelected(),a.updateCounter()},b.prototype.updateCounter=function(){var b=this;b.$element.attr("multiple")&&b.options.groupCounter&&a.each(b.$firstSelect.find("option"),function(c,d){var e=a(d).val(),f=a(d).data("currentLabel"),g=b.$element.find('optgroup[label="'+e+'"] option:selected').length;g>0&&(f+=" ("+g+")"),a(d).html(f)})},b.prototype.checkSelected=function(){var b=this;if(b.$element.attr("multiple")&&b.options.maximumSelected){var c=0;if(c="function"==typeof b.options.maximumSelected?b.options.maximumSelected(b.$firstSelect,b.$secondSelect):b.options.maximumSelected,!(c<1)){var d=b.$element.find("option:selected");if(d.length>c){b.$firstSelect.find("option:selected").prop("selected",!1),b.$secondSelect.find("option:selected").prop("selected",!1),b.initialized?(b.$element.find("option:selected").prop("selected",!1),b.last$ElementSelected.prop("selected",!0)):a.each(b.$element.find("option:selected"),function(b,d){b>c-1&&a(d).prop("selected",!1)});var e=b.last$ElementSelected.first().parent().attr("label");b.$firstSelect.find('option[value="'+e+'"]').prop("selected",!0),b.createSecondSelect(),b.options.maximumAlert(c)}}}},b.prototype.basicUpdateChildCategory=function(b,c){var d=this;d.last$ElementSelected=d.$element.find("option:selected");var e=d.$secondSelect.val();a.isArray(e)||(e=[e]);var f=d.$firstSelect.val(),g=!1;d.$element.attr("multiple")?d.options.onlySameGroup?a.each(d.$element.find("option:selected"),function(b,c){if(a(c).parent().attr("label")!=f)return g=!0,!1}):c||(g=!0):g=!0,g?d.$element.find("option:selected").prop("selected",!1):a.each(d.$element.find("option:selected"),function(b,c){f==a(c).parent().attr("label")&&a.inArray(a(c).val(),e)==-1&&a(c).prop("selected",!1)}),a.each(e,function(a,b){d.$element.find('option[value="'+b+'"]').prop("selected",!0)}),d.checkSelected(),d.updateCounter(),d.$element.trigger("change")},b.prototype.updateChildCategory=function(b){"change"==b.type?this.timeOut=setTimeout(a.proxy(function(){this.basicUpdateChildCategory(b,b.ctrlKey)},this),10):"click"==b.type&&(clearTimeout(this.timeOut),this.basicUpdateChildCategory(b,b.ctrlKey))},b.prototype.destroy=function(){this.$wrapper.remove(),this.$element.removeData(this.type),this.$element.show()},a.fn.multiselectsplitter=c,a.fn.multiselectsplitter.Constructor=b,a.fn.multiselectsplitter.VERSION="1.0.1"}(jQuery);