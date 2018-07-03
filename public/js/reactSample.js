 var HelloWorld = React.createClass({
       // <HelloWorld />をレンダリング（表示）
       render: function() {
         return (
           <p>Hello!World!</p>
         );
       }
     });

     // id='app'に<HelloWorld />を埋め込む（マウント）
     var m = React.render(<HelloWorld />, document.getElementById('app'));
