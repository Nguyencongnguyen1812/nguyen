import React from 'react';
import './App.css';

import Person from './components/Person';
// import Example from './components/Example';

function App() {
    const skclick = () => {
        console.log('click')
    }
    return (
        <div className="App" >
            <h1 > học react js </h1>
            <Person name="nguyen" age="20"> <h3>anh nguyen dep trai</h3></Person>
            <Person name="van" age="51" />
            <button onClick={()=>skclick()}>click</button>
            {/* <Example>Example</Example> */}
        </div >
    );
  
}

export default App;