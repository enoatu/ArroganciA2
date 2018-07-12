<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- <script src="{{ url('js/bootstrap.min.js') }}"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{ url('js/post.js') }}"></script>
{{ assets.outputJs() }}
<script>
    {% if info is defined and msg is defined %}
         info({{ info }},{{ msg }});
    {% endif %}
    $(function () {
            $('[data-toggle="tooltip"]').tooltip();
    });
</script>
</body>
<html>
