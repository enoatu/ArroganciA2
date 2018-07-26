{% include "layouts/header.volt" %}
{% include "layouts/globalMenu.volt" %}
{% include "tables/tables.volt" %}

{% set num = 0 %}
{% for data in page.items %}
{% set num = num + 1 %}
<form name="f1" method="POST" action="{{url('deletefav/index/' ~ kind)}}">
<tr>
    <td onclick="getElementById('a{{ num }}') . click();" class='list'>
        <input type='checkbox' id='a{{ num }}' class="checkbox" name='check[]' value='{{ data.tweet_id }}' onclick="getElementById('a{{ num }}').click();show();">
    </td>
    <td class='list'>
        <div ondblclick="window.open('{{'https://twitter.com/' ~ data.account_name ~ '/status/'  ~ data.tweet_id }}')">{{ data.tweet }}</div>
    </td>
    <td class='list'>
        {{ data.sender_name }}
    </td>
    <td onclick="getElementById('a{{ num }}') . click();" class='list'>
        {{ data.time }}
    </td>
</tr> 
{% endfor %}
    </tbody>
</table>
<!-- popup -->
<div id="popup">
    <div id="in_popup">
        <button type="submit" class="btn btn-primary btn-lg">
            <span class="glyphicon glyphicon-trash"></span>　選択したものを消去する</button>
    </div>
</div>
</form>
<!-- pager -->
{% include "tables/pager.volt" %}
</div>
{% include "layouts/footer.volt" %}
