import { useEffect, useState } from "react";
import { useParams, NavLink, useNavigate } from "react-router";
import { useForm, useWatch } from "react-hook-form";
import { fetchPost } from "../../services/fetchPost";
import { CardAction, CardFooter, PrimaryButton } from "../../components/ui";
import { transformDate } from "../../lib/utils";
import AvatarCircle from "../../components/ui/AvatarCircle";
import {  toast } from 'react-toastify';
import {ModalDelete} from "../../components/ModalDelete";
import { ComeBackLink } from "../../components/ComeBackLink";
import { useExchangerate } from "../../contexts/ExchangerateContext";
import { displayResponseMessages } from "../../lib/utils";

export  function ExchangeDetail() {
  const { id } = useParams();
  const {getExchangerate, partialUpdateExchangerate, removeExchangerate, refetchExchangerates} = useExchangerate()
  const exchangerate = getExchangerate(id);
  const [rate, setRate] = useState(null);

  const [isPreselected, setIsPreselected] = useState(false);
  const [isUpdatingPreselected, setIsUpdatingPreselected] = useState(false);


  const endpoint = "exchangerates/" + id;
  const navigate = useNavigate();
  
  // const {data:exchange, loading, error} = useFetchGet(endpoint)
  const { register, handleSubmit, setValue, setError, control, formState: { errors, isSubmitting } } = useForm({defaultValues: {
    "base_amount": 0,
    "target_amount": 0,
  }});
  
  // const handlePreselect

  useEffect(() => {
    if (exchangerate) {
      setRate(parseFloat(exchangerate.rate))
      setValue( "base_amount", parseFloat(exchangerate.base_amount)); 
      setValue( "target_amount", parseFloat(exchangerate.target_amount));
      setIsPreselected(Boolean(exchangerate.is_default));
    }

  }, [exchangerate]);


  const base_amount = useWatch({ control, name: "base_amount" });
  const target_amount = useWatch({ control, name: "target_amount" });

  useEffect(() => {
    if (base_amount && target_amount) {
      setRate((target_amount / base_amount).toFixed(3));
    }
  }, [base_amount, target_amount]);

  const handleChangePreselected = () => {
    if (!isPreselected) {
      if (!isUpdatingPreselected) {
        
        setIsPreselected(true);
        setIsUpdatingPreselected(true);

        fetch("/api/" + endpoint + "/choice", {
          method: "PUT"
        }).then((resp) => {
          if (!resp.ok) {
            throw new Error();
          }
          refetchExchangerates();
          toast.success("Tipo de cambio elegido como primero");

        }).catch(err => toast.error("No fue posible elegir el tipo de cambio como primero"))
        .finally(setIsUpdatingPreselected(false))
      }
    }
    
  }

  const onSubmit = async (data) => {
    data.rate = rate;
    const response = await fetchPost(endpoint, data, "PUT");
    displayResponseMessages(response, data, setError)
    
    if (!response.errors) {
      partialUpdateExchangerate(id, data)
      navigate("../");
    }
  }

  const deleteExchange = async () => {
    const response = await fetchPost(endpoint, null, "DELETE");
    displayResponseMessages(response, {}, setError)

    if (!response.errors) {
      navigate("../");
      removeExchangerate(id);
    }
  }

  return (
    <section>
      <ComeBackLink />
      
      <h1 className="text-3xl font-medium">Editando cambio {exchangerate?.name}</h1>

      <div className={`max-w-xl my-4 p-2 border border-gray-200 rounded dark:border-gray-700  ${isUpdatingPreselected ? 'bg-gray-300 dark:bg-gray-600' : ''}`}>
        <div className="flex items-center">
        <input id="bordered-checkbox-1" type="checkbox" checked={isPreselected} onChange={handleChangePreselected} disabled={isUpdatingPreselected}
        name="bordered-checkbox" className="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
        <label htmlFor="bordered-checkbox-1" className="w-full py-4 ms-2 font-medium text-gray-900 dark:text-gray-300">Primero en mostrar</label>
        </div>
        <p className="text-sm">
          {isPreselected ? 'Éste tipo de cambio será el primero que tus usuarios verán al entrar a la página' : 'Marca ésta casilla para elegir éste tipo de cambio como el primero en mostrar.'}
        </p>
      </div>
      
      <form className="max-w-xl" onSubmit={handleSubmit(onSubmit)} >
        {exchangerate &&
      <CardAction 
        extraClass={`items-center gap-4 p-6 ${isPreselected ? 'drop-shadow-md shadow-md shadow-indigo-600' : ''} `}>
        
              
              <div className="w-full flex flex-col sm:flex-row justify-between items-center gap-4">
                
                <div className="w-full">
                  <label htmlFor="name" className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Valor de Moneda Base</label>
                  {errors.base_amount && <p className="text-red-800 font-medium">{errors.base_amount.message}</p>}
                  <div className="flex">
                    <div className="flex gap-3  items-center p-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                    <AvatarCircle image={exchangerate.base_image} />
                      {exchangerate.base_symbol}
                    </div>
                    <input 
                    type="number" step="0.1"

                    
                    className="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    {...register("base_amount", 
                      {
                        min: {value: 0, message: "el valor debe ser postivo"},
                        max: {value: 999999999999, message: "el valor es demasiado alto"},
                        required: "Proporciona un monto para la moneda de base",
                      }
                    )}
                    />
                  </div>
                </div>
                <svg  className="size-8 hidden sm:block mt-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor">
                  <path strokeLinecap="round" strokeLinejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                </svg>
                
                <svg className="size-8 block sm:hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" >
                  <path strokeLinecap="round" strokeLinejoin="round" d="M19.5 13.5 12 21m0 0-7.5-7.5M12 21V3" />
                </svg>
                
            
                <div className="w-full">
                  <label htmlFor="name" className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Valor Moneda de Destino</label>
                  {errors.target_amount && <p className="text-red-800 font-medium">{errors.target_amount.message}</p>}
                  <div className="flex">
                    <div className="flex gap-3  items-center p-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                    <AvatarCircle image={exchangerate.target_image} />
                      {exchangerate.target_symbol}
                    </div>
                    <input 
                    type="number" step="0.1"
                    className="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    {...register("target_amount", 
                      {
                        min: {value: 0, message: "el valor debe ser postivo"},
                        max: {value: 999999999999, message: "el valor es demasiado alto"},
                        required: "Proporciona un monto para la moneda de destino",
                      }
                    )}
                    />
                  </div>
                </div>

              </div>
              <span className=" text-gray-500 dark:text-gray-400">Valor Actualizado el {transformDate(exchangerate.updated_at)}</span>

              <div className="text-center ">
                <p className="font-light text-sm">Tasa</p>
                <p className="font-semibold text-3xl mb-3">{rate}</p>
              </div>
              
                  <PrimaryButton
                    isDisabled={isSubmitting}
                  
                  >Guardar Cambio</PrimaryButton>
          </CardAction>
          }

      </form>

      <div className="mt-12 w-full max-w-4xl flex flex-col sm:flex-row gap-4 justify-between items-center">
        <div className="w-full max-w-lg">
          <p className="text-lg mb-2  ">Eliminar Cambio</p>
          <p>Al eliminar el tipo de cambio éste desaparecerá de la página publica de tu sitio.</p>
        </div>

        <ModalDelete 
          isDisabled={isSubmitting}

        deleteButtonText="Eliminar Cambio"
        deleteCallback={deleteExchange}>
          <h3 className="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Estás seguro de que quieres eliminar este Tipo de Cambio?</h3>
        </ModalDelete>
      </div>

    </section>
  )
}
