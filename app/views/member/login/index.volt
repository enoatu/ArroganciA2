{% include "components/header.volt" %}
{% include "components/globalMenu.volt" %}
<h1>
    ArroganciA
</h1>
{{ tag.form("index/register") }}
{{ tag.textarea("text") }}
<p>
{{ tag.submitButton("Make") }}
</p>
</form>
{% include "components/footer.volt" %}