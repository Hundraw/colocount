import React from "react";
import Nav from "../../components/nav/nav";
import BlockTitle from "../../components/block-title/BlockTitle";
import Input from "../../components/input/input";
import './ParameterUser';
import Button from "../../components/button/button";
import DeleteFlatshare from "../../components/deleteFlatshare/DeleteFlatshare";

const ParameterUser = () => {
  
  return (
    <div>
      <Nav />
      <div className="flex justify-evenly gap-24 my-14">
        <div className="parent-input flex flex-col gap-y-12">
          <BlockTitle name="Roommates" />

          <div className="flex justify-between">
            <Input placeholder={''} onChange={() => {''}} />
            <DeleteFlatshare/>


          </div>


          <Button name="Inviter un futur colocataire" onClick={() => {''}}/>
        </div>

        <div className="flex align-center flex-col gap-y-12">
          <BlockTitle name="Roommate group" />
          <Input placeholder={''} onChange={() => {''}} />
          <Button name="Enregistrer les modifications" onClick={() => {''}}/>
        </div>

      </div>
    </div>
  );
};

export default ParameterUser;
