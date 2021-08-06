import React from 'react';
const Person = (props) => {
    return (
        <div>
            <p > hello word tên: {props.name} <p></p>age:{props.age} </p>
            <p>{props.children}</p>
        </div>
    );
}
export default Person;