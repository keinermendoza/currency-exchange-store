import { useState, useEffect } from "react";
import { NavLink, useNavigate } from "react-router";
import { useForm } from "react-hook-form";
import { CardAction, CardFooter, PrimaryButton } from "../../components/ui";
import { ExchangeCurrencyDropdown } from "../../components/forms";
import { fetchPost } from "../../services/fetchPost";
import { ComeBackLink } from "../../components/ComeBackLink";
import { useCurrency } from "../../contexts/CurrencyContext";
import { useExchangerate } from "../../contexts/ExchangerateContext";

import {displayResponseMessages} from "../../lib/utils";

export  function ExchangeCreate() {
  const [baseCurrency, setBaseCurrency] = useState(null); // object
  const [targetCurrency, setTargetCurrency] = useState(null); // object
  const navigate = useNavigate();
  const {currencies, getCurrency} = useCurrency();
  const {addExchangerate} = useExchangerate();
  
  const { register, handleSubmit, setValue, setError, clearErrors, control, formState: { errors, isSubmitting } } = useForm();
  
  const onSubmit = async (data) => {
    const response = await fetchPost("exchangerates", data);

    displayResponseMessages(response, data, setError)
    
    
    if (!response.errors) {
      navigate("../");
      addExchangerate(response.data);
    }
  }

 
  const handleSelectBaseCurrency = (id) => {
    setBaseCurrency(getCurrency(id));
  }
  
  const handleSelectTargetCurrency = (id) => {
    setTargetCurrency(getCurrency(id));
  }

  useEffect(() => {
    if(baseCurrency) {
      setValue("base_currency", baseCurrency.id)
      clearErrors("base_currency")
    }
  },[baseCurrency])

  useEffect(() => {
    if(targetCurrency) {
      setValue("target_currency", targetCurrency.id)
      clearErrors("target_currency")
    }
  },[targetCurrency])

  
  return (
    <section>

      <ComeBackLink />

      <h1 className="text-3xl font-medium">Registrar Tipo de Cambio</h1>

      <form className="max-w-sm" onSubmit={handleSubmit(onSubmit)} >
      <CardAction extraClass="gap-4">
        <div>
          <p className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Moneda Base</p>
          {errors.base_currency && <p className="text-red-800 font-medium">{errors.base_currency.message}</p>}
          <ExchangeCurrencyDropdown
            options={currencies}
            selectedOption={baseCurrency}
            handleChange={handleSelectBaseCurrency}
          />
        </div>

        <div>
          <label htmlFor="base_amount" className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Valor de Moneda Base</label>
          {errors.base_amount && <p className="text-red-800 font-medium">{errors.base_amount.message}</p>}
          <div className="flex">
            <span className="w-10 grid place-content-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
              {baseCurrency && baseCurrency.symbol}
            </span>
            <input 
            type="number"
            min={0.000001}
            step={0.000001}
            className="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            {...register("base_amount", 
              {
                min: {value: 0.000001, message: "el valor debe ser postivo"},
                max: {value: 999999999999, message: "el valor es demasiado alto"},
                required: "Proporciona un monto para la moneda base",
              }
            )}
            />
          </div>
          
        </div>

        <div>
          <p className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Moneda de Destino</p>
          {errors.target_currency && <p className="text-red-800 font-medium">{errors.target_currency.message}</p>}
          <ExchangeCurrencyDropdown
            options={currencies}
            selectedOption={targetCurrency}
            handleChange={handleSelectTargetCurrency}
          />
        </div>

        <div>
          <label htmlFor="name" className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Valor Moneda de Destino</label>
          {errors.target_amount && <p className="text-red-800 font-medium">{errors.target_amount.message}</p>}
          <div className="flex">
            <span className="w-10 grid place-content-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
              {targetCurrency && targetCurrency.symbol}
            </span>
            <input 
            type="number"
            min={0.000001}
            step={0.000001}
            className="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            {...register("target_amount", 
              {
                min: {value: 0.000001, message: "el valor debe ser postivo"},
                max: {value: 999999999999, message: "el valor es demasiado alto"},
                required: "Proporciona un monto para la moneda de destino",
              }
            )}
            />
          </div>
        </div>


        <input 
          type="hidden"
          {...register("base_currency", 
            {
              required: "Selecciona una moneda base",
            }
          )}
        />

        <input 
          type="hidden"
          {...register("target_currency", 
            {
              required: "Selecciona una moneda de destino",
            }
          )}
        />
        
        <CardFooter extraClass="justify-end">
          <PrimaryButton
            isDisabled={isSubmitting}
          >Guardar Cambios</PrimaryButton>
        </CardFooter>
      </CardAction>  
      </form>


    </section>
  )
}
