<include href="views/parts/header.php"></include>
<check if="{{ sizeof(@owners) > 0 }}">
    <true>
        <p>WE HAVE ELEMENTS!</p>
    </true>
    <false>
        <p>WE HAVE NO ELEMENTS!</p>
    </false>
</check>
<repeat group="{{ @owners }}" key="{{ @owner }}" value="{{ @car }}">
    <p><strong>{{ @owner }} </strong>owns a {{ @car }}, excelsior!!!</p>
</repeat>
<p>{{ @cat | raw }} would not own a car: <img src="{{ @BASE }}/images/garfield.jpeg"></p>
<include href="views/parts/footer.php"></include>