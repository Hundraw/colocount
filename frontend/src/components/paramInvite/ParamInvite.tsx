import React from "react";
import { useState, useEffect } from "react";

interface MyData {
  id: number;
  name: string;
}

interface Props {}

const ParamInvite: React.FC<Props> = () => {
  const [data, setData] = useState<MyData[]>([
    { id: 1, name: 'Gustave' },
    { id: 2, name: 'Mehdi' },
    { id: 3, name: 'Dimitri' },
    { id: 4, name: 'Corentin' },
  ]);

  useEffect(() => {

    async function fetchData() {
      const response = await fetch("");
      const data = await response.json();
      setData(data);
    }
    fetchData();
  }, []);


  const handleDelete = (id : number) => {
    setData(data.filter((item) => item.id !== id));
  };

  return (
    <div>
      {data.map((item) => (
        <div className="flex items-center justify-between align-center w-80 py-2 px-4 mb-4 bg-white text-black font-semibold rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-orange focus:ring-opacity-75">{item.name}
        <button onClick={() => handleDelete(item.id)} className="h-10 w-10 bg-orange rounded-md shadow-lg focus:outline-none hover:ring-2 hover:ring-orange focus:ring-opacity-75">
          <i className="ri-close-line"></i>
        </button>
        </div>
      ))}
    </div>
  );
};

export default ParamInvite;
