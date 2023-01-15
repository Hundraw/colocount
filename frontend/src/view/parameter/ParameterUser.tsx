import React, { useState } from "react";
import Nav from "../../components/nav/nav";
import BlockTitle from "../../components/block-title/BlockTitle";
import Input from "../../components/input/input";
import './ParameterUser';
import Button from "../../components/button/button";
import ParamInvite from "../../components/paramInvite/ParamInvite";

const ParameterUser = () => {

  const[state, setState] = useState({
    title : '',
})
  
  return (
    <div>
      <Nav />
      <div className="flex justify-evenly gap-24 my-14">
        <div className="parent-input flex items-center  flex-col gap-y-10">
          <BlockTitle name="Roommates" />
          <ParamInvite/>

          <Button name="Invite a future roommate" onClick={() => {''}}/>
          <Input placeholder={''} onChange={() => {''}} />
        </div>

        <div className="flex items-center flex-col gap-y-10">
          <BlockTitle name="Roommate group" />
          <Input placeholder={state.title} onChange={() => {''}} />
          <Button name="Save Changes" onClick={() => {''}}/>
        </div>

      </div>
    </div>
  );
};

export default ParameterUser;
