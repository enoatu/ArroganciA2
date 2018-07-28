{% include "layouts/header.volt" %}
{% include "layouts/globalMenu.volt" %}
{% include "tables/tables.volt" %}

{% set num = 0 %}
{% for data in page.items %}
{% set num = num + 1 %}
<tr>
    <td class='list'>
        <button id='a{{ num }}' name='check[]' value='{{ data.tweet_id }}' onclick="post(a{{ num }},'{{ data.tweet_id }}');disabled = true;"><img src='{{ url('img/star.png') }}'></button>
    </td>

    {% if sender is not defined %}
    <td class='list'>
        <div ondblclick="window.open('{{'https://twitter.com/' ~ data.account_name ~ '/status/'  ~ data.tweet_id }}')">{{ data.tweet }}</div>
    </td>
    {% endif %}
    <td class='list'>
        {{ data.sender_name }}
    </td>
    {% if date is not defined %}
    <td onclick="getElementById('a{{ num }}') . click();" class='list'>
        {{ data.time }}
    </td>
    {% endif %}
</tr> 
{% endfor %}
    </tbody>
</table>
<!-- popup no-->
<!-- pager -->
{% include "tables/pager.volt" %}
</div>
{% include "layouts/footer.volt" %}
