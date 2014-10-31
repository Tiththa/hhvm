(**
 * Copyright (c) 2014, Facebook, Inc.
 * All rights reserved.
 *
 * This source code is licensed under the BSD-style license found in the
 * LICENSE file in the "hack" directory of this source tree. An additional grant
 * of patent rights can be found in the PATENTS file in the same directory.
 *
 *)

(* generated by ocamltarzan *)

open Ast
open Utils

exception IncorrectMapping

let map_pos_t p = p
let map_of_bool b = b
let map_of_float f = f
let map_of_string s = s
let map_smap _ v = v
let map_namespace_env e = e
let map_of_list map_of_elem l = List.map map_of_elem l
let map_mode m = m
let map_of_option = opt_map

let simple_map (k, _) x = k x

type 'a mapper_in = {
  k_hintOption: (hint option -> hint option) * 'a mapper_out -> hint option -> hint option;
  k_class_: (class_ -> class_) * 'a mapper_out -> class_ -> class_;
  k_c_body: (class_elt list -> class_elt list) * 'a mapper_out -> class_kind -> class_elt list -> class_elt list;
  k_class_elt: (class_elt -> class_elt) * 'a mapper_out -> class_kind -> class_elt -> class_elt;
  k_fun_: (fun_ -> fun_) * 'a mapper_out -> fun_ -> fun_;
  k_method_: (method_ -> method_) * 'a mapper_out -> class_kind -> method_ -> method_;
  k_typeconst: (typeconst -> typeconst) * 'a mapper_out -> class_kind -> typeconst -> typeconst;
  k_def: (def -> def) * 'a mapper_out -> def -> def;
  k_expr: (expr -> expr) * 'a mapper_out -> expr -> expr;
  k_expr_: (expr_ -> expr_) * 'a mapper_out -> expr_ -> expr_;
  k_fun_param: (fun_param -> fun_param) * 'a mapper_out -> fun_param -> fun_param;
  k_fun_params: (fun_param list -> fun_param list) * 'a mapper_out -> fun_param list -> fun_param list;
  k_stmt: (stmt -> stmt) * 'a mapper_out -> stmt -> stmt;
  k_program: (program -> program) * 'a mapper_out -> program -> program;
}
and 'a mapper_out =  'a -> 'a

let default_mapper =
  {
    k_hintOption = simple_map;
    k_class_ = simple_map;
    k_c_body = (fun (k, _) _ x -> k x);
    k_class_elt = (fun (k, _) _ x -> k x);
    k_fun_ = simple_map;
    k_method_ = (fun (k, _) _ x -> k x);
    k_typeconst = (fun (k, _) _ x -> k x);
    k_def = simple_map;
    k_expr = simple_map;
    k_expr_ = simple_map;
    k_fun_param = simple_map;
    k_fun_params = simple_map;
    k_stmt = simple_map;
    k_program = simple_map;
  }

let mk_mapper = fun m_in ->
  let rec map_program v =
    let k v = map_of_list map_def v in
    m_in.k_program (k, all_mappers) v
  and map_id (v1, v2) =
    let v1 = map_pos_t v1 and v2 = map_of_string v2 in (v1, v2)
  and map_pstring (v1, v2) =
    let v1 = map_pos_t v1 and v2 = map_of_string v2 in (v1, v2)
  and map_hint_option hintOpt =
    let k h = map_of_option map_hint h
    in
    m_in.k_hintOption (k, all_mappers) hintOpt
  and map_cst_kind =
    function
      | Cst_define -> Cst_define
      | Cst_const -> Cst_const
  and map_def def =
    let k =
      function
      | Fun v1 -> let v1 = map_fun_ v1 in Fun ((v1))
      | Class v1 -> let v1 = map_class_ v1 in Class ((v1))
      | Stmt v1 -> let v1 = map_stmt v1 in Stmt ((v1))
      | Typedef v1 -> let v1 = map_typedef v1 in Typedef ((v1))
      | Constant v1 -> let v1 = map_gconst v1 in Constant ((v1))
      | Namespace ((v1, v2)) ->
          let v1 = map_id v1 and v2 = map_program v2 in Namespace ((v1, v2))
      | NamespaceUse v1 ->
          let v1 =
            map_of_list
              (fun (v1, v2) -> let v1 = map_id v1 and v2 = map_id v2 in (v1, v2))
              v1
          in NamespaceUse ((v1))
    in m_in.k_def (k, all_mappers) def
  and
    map_typedef {
                  t_id = v_t_id;
                  t_tparams = v_t_tparams;
                  t_constraint = v_t_constraint;
                  t_kind = v_t_kind;
                  t_namespace = v_t_namespace;
                  t_mode = v_t_mode
                } =
    let v_t_id = map_id v_t_id in
    let v_t_tparams = map_of_list map_tparam v_t_tparams in
    let v_t_constraint = map_tconstraint v_t_constraint in
    let v_t_kind = map_typedef_kind v_t_kind in
    let v_t_namespace = map_namespace_env v_t_namespace in
    let v_t_mode = map_mode v_t_mode
    in
      {
        t_id = v_t_id;
        t_tparams = v_t_tparams;
        t_constraint = v_t_constraint;
        t_kind = v_t_kind;
        t_namespace = v_t_namespace;
        t_mode = v_t_mode;
      }
  and
    map_gconst {
                 cst_mode = v_cst_mode;
                 cst_kind = v_cst_kind;
                 cst_name = v_cst_name;
                 cst_type = v_cst_type;
                 cst_value = v_cst_value;
                 cst_namespace = v_cst_namespace
               } =
    let v_cst_mode = map_mode v_cst_mode in
    let v_cst_kind = map_cst_kind v_cst_kind in
    let v_cst_name = map_id v_cst_name in
    let v_cst_type = map_hint_option v_cst_type in
    let v_cst_value = map_expr v_cst_value in
    let v_cst_namespace = map_namespace_env v_cst_namespace
    in
      {
        cst_mode = v_cst_mode;
        cst_kind = v_cst_kind;
        cst_name = v_cst_name;
        cst_type = v_cst_type;
        cst_value = v_cst_value;
        cst_namespace = v_cst_namespace;
      }
  and map_variance =
    function
    | Covariant -> Covariant
    | Contravariant -> Contravariant
    | Invariant -> Invariant
  and map_tparam (v1, v2, v3) =
    let v1 = map_variance v1
    and v2 = map_id v2
    and v3 = map_hint_option v3
    in (v1, v2, v3)
  and map_tconstraint v = map_hint_option v
  and map_typedef_kind =
    function
    | Alias v1 -> let v1 = map_hint v1 in Alias ((v1))
    | NewType v1 -> let v1 = map_hint v1 in NewType ((v1))
  and
    map_class_ class_ =
    let k {
            c_mode = v_c_mode;
            c_user_attributes = v_c_user_attributes;
            c_final = v_c_final;
            c_kind = v_c_kind;
            c_is_xhp = v_c_is_xhp;
            c_name = v_c_name;
            c_tparams = v_c_tparams;
            c_extends = v_c_extends;
            c_implements = v_c_implements;
            c_body = v_c_body;
            c_namespace = v_c_namespace;
            c_enum = v_c_enum
        } =
      let v_c_mode = map_mode v_c_mode in
      let v_c_user_attributes =
        map_smap map_user_attribute v_c_user_attributes in
      let v_c_final = map_of_bool v_c_final in
      let v_c_kind = map_class_kind v_c_kind in
      let v_c_is_xhp = map_of_bool v_c_is_xhp in
      let v_c_name = map_id v_c_name in
      let v_c_tparams = map_of_list map_tparam v_c_tparams in
      let v_c_extends = map_of_list map_hint v_c_extends in
      let v_c_implements = map_of_list map_hint v_c_implements in
      let v_c_body = map_c_body v_c_kind v_c_body in
      let v_c_namespace = map_namespace_env v_c_namespace in
      let v_c_enum = map_of_option map_enum_ v_c_enum
      in
        {
          c_mode = v_c_mode;
          c_user_attributes = v_c_user_attributes;
          c_final = v_c_final;
          c_kind = v_c_kind;
          c_is_xhp = v_c_is_xhp;
          c_name = v_c_name;
          c_tparams = v_c_tparams;
          c_extends = v_c_extends;
          c_implements = v_c_implements;
          c_body = v_c_body;
          c_namespace = v_c_namespace;
          c_enum = v_c_enum;
        }
    in m_in.k_class_ (k, all_mappers) class_
  and map_enum_ { e_base = v_e_base; e_constraint = v_e_constraint } =
    let v_e_base = map_hint v_e_base in
    let v_e_constraint = map_hint_option v_e_constraint
    in { e_base = v_e_base; e_constraint = v_e_constraint; }
  and map_user_attribute v = map_of_list map_expr v
  and map_class_kind =
    function
    | Cabstract -> Cabstract
    | Cnormal -> Cnormal
    | Cinterface -> Cinterface
    | Ctrait -> Ctrait
    | Cenum -> Cenum
  and map_trait_req_kind =
    function | MustExtend -> MustExtend | MustImplement -> MustImplement
  and map_c_body c_kind c_body =
    let k c_body = map_of_list (map_class_elt c_kind) c_body in
    m_in.k_c_body (k, all_mappers) c_kind c_body
  and map_class_elt c_kind elt =
    let k =
      function
      | Const ((v1, v2)) ->
          let v1 = map_hint_option v1
          and v2 =
            map_of_list
              (fun (v1, v2) ->
                 let v1 = map_id v1 and v2 = map_expr v2 in (v1, v2))
              v2
          in Const ((v1, v2))
      | Attributes v1 ->
          let v1 = map_of_list map_class_attr v1 in Attributes ((v1))
      | ClassUse v1 -> let v1 = map_hint v1 in ClassUse ((v1))
      | ClassTraitRequire ((v1, v2)) ->
          let v1 = map_trait_req_kind v1
          and v2 = map_hint v2
          in ClassTraitRequire ((v1, v2))
      | ClassVars ((v1, v2, v3)) ->
          let v1 = map_of_list map_kind v1
          and v2 = map_hint_option v2
          and v3 = map_of_list map_class_var v3
          in ClassVars ((v1, v2, v3))
      | Method v1 -> let v1 = map_method_ c_kind v1 in Method ((v1))
      | TypeConst v1 -> let v1 = map_typeconst c_kind v1 in TypeConst v1
    in m_in.k_class_elt (k, all_mappers) c_kind elt
  and map_class_attr =
    function
    | CA_name v1 -> let v1 = map_id v1 in CA_name ((v1))
    | CA_field v1 -> let v1 = map_ca_field v1 in CA_field ((v1))
  and
    map_ca_field {
                   ca_type = v_ca_type;
                   ca_id = v_ca_id;
                   ca_value = v_ca_value;
                   ca_required = v_ca_required
                 } =
    let v_ca_type = map_ca_type v_ca_type in
    let v_ca_id = map_id v_ca_id in
    let v_ca_value = map_of_option map_expr v_ca_value in
    let v_ca_required = map_of_bool v_ca_required
    in
      {
        ca_type = v_ca_type;
        ca_id = v_ca_id;
        ca_value = v_ca_value;
        ca_required = v_ca_required;
      }
  and map_ca_type =
    function
    | CA_hint v1 -> let v1 = map_hint v1 in CA_hint ((v1))
    | CA_enum v1 -> let v1 = map_of_list map_of_string v1 in CA_enum ((v1))
  and map_kind =
    function
    | Final -> Final
    | Static -> Static
    | Abstract -> Abstract
    | Private -> Private
    | Public -> Public
    | Protected -> Protected
  and map_og_null_flavor =
    function
    | OG_nullthrows -> OG_nullthrows
    | OG_nullsafe -> OG_nullsafe
  and map_class_var (v1, v2) =
    let v1 = map_id v1 and v2 = map_of_option map_expr v2 in (v1, v2)
  and
    map_typeconst c_kind typeconst =
      let k {
          tconst_kind = v_tconst_kind;
          tconst_name = v_tconst_name;
          tconst_type = v_tconst_type
        } =
      let v_tconst_kind = map_of_list map_kind v_tconst_kind in
      let v_tconst_name = map_id v_tconst_name in
      let v_tconst_type = map_hint_option v_tconst_type
      in
        {
          tconst_kind = v_tconst_kind;
          tconst_name = v_tconst_name;
          tconst_type = v_tconst_type;
        }
    in m_in.k_typeconst (k, all_mappers) c_kind typeconst
  and
    map_method_ c_kind method_ =
      let k {
                  m_kind = v_m_kind;
                  m_tparams = v_m_tparams;
                  m_name = v_m_name;
                  m_params = v_m_params;
                  m_body = v_m_body;
                  m_user_attributes = v_m_user_attributes;
                  m_ret = v_m_ret;
                  m_ret_by_ref = v_m_ret_by_ref;
                  m_fun_kind = v_m_fun_kind
                } =
      let v_m_kind = map_of_list map_kind v_m_kind in
      let v_m_tparams = map_of_list map_tparam v_m_tparams in
      let v_m_name = map_id v_m_name in
      let v_m_params = map_fun_params v_m_params in
      let v_m_body = map_block v_m_body in
      let v_m_user_attributes =
        map_smap map_user_attribute v_m_user_attributes in
      let v_m_ret = map_hint_option v_m_ret in
      let v_m_ret_by_ref = map_of_bool v_m_ret_by_ref in
      let v_m_fun_kind = map_fun_kind v_m_fun_kind
      in
        {
          m_kind = v_m_kind;
          m_tparams = v_m_tparams;
          m_name = v_m_name;
          m_params = v_m_params;
          m_body = v_m_body;
          m_user_attributes = v_m_user_attributes;
          m_ret = v_m_ret;
          m_ret_by_ref = v_m_ret_by_ref;
          m_fun_kind = v_m_fun_kind;
        }
    in m_in.k_method_ (k, all_mappers) c_kind method_
  and map_is_reference v = map_of_bool v
  and map_is_variadic v = map_of_bool v
  and map_fun_params fun_params =
    let k fun_params = map_of_list map_fun_param fun_params in
    m_in.k_fun_params (k, all_mappers) fun_params
  and
    map_fun_param fun_param =
      let k {
                    param_hint = v_param_hint;
                    param_is_reference = v_param_is_reference;
                    param_is_variadic = v_param_is_variadic;
                    param_id = v_param_id;
                    param_expr = v_param_expr;
                    param_modifier = v_param_modifier;
                    param_user_attributes = v_param_user_attributes
                  } =
      let v_param_hint = map_hint_option v_param_hint in
      let v_param_is_reference = map_is_reference v_param_is_reference in
      let v_param_is_variadic = map_is_variadic v_param_is_variadic in
      let v_param_id = map_id v_param_id in
      let v_param_expr = map_of_option map_expr v_param_expr in
      let v_param_modifier = map_of_option map_kind v_param_modifier in
      let v_param_user_attributes =
        map_smap map_user_attribute v_param_user_attributes
      in
        {
          param_hint = v_param_hint;
          param_is_reference = v_param_is_reference;
          param_is_variadic = v_param_is_variadic;
          param_id = v_param_id;
          param_expr = v_param_expr;
          param_modifier = v_param_modifier;
          param_user_attributes = v_param_user_attributes;
        } in
    m_in.k_fun_param (k, all_mappers) fun_param
  and
    map_fun_ fun_ =
      let k {
               f_mode = v_f_mode;
               f_tparams = v_f_tparams;
               f_ret = v_f_ret;
               f_ret_by_ref = v_f_ret_by_ref;
               f_name = v_f_name;
               f_params = v_f_params;
               f_body = v_f_body;
               f_user_attributes = v_f_user_attributes;
               f_mtime = v_f_mtime;
               f_fun_kind = v_f_fun_kind;
               f_namespace = v_f_namespace
             } =
      let v_f_mode = map_mode v_f_mode in
      let v_f_tparams = map_of_list map_tparam v_f_tparams in
      let v_f_ret = map_hint_option v_f_ret in
      let v_f_ret_by_ref = map_of_bool v_f_ret_by_ref in
      let v_f_name = map_id v_f_name in
      let v_f_params = map_fun_params v_f_params in
      let v_f_body = map_block v_f_body in
      let v_f_user_attributes =
        map_smap map_user_attribute v_f_user_attributes in
      let v_f_mtime = map_of_float v_f_mtime in
      let v_f_fun_kind = map_fun_kind v_f_fun_kind in
      let v_f_namespace = map_namespace_env v_f_namespace
      in
        {
          f_mode = v_f_mode;
          f_tparams = v_f_tparams;
          f_ret = v_f_ret;
          f_ret_by_ref = v_f_ret_by_ref;
          f_name = v_f_name;
          f_params = v_f_params;
          f_body = v_f_body;
          f_user_attributes = v_f_user_attributes;
          f_mtime = v_f_mtime;
          f_fun_kind = v_f_fun_kind;
          f_namespace = v_f_namespace;
        }
    in m_in.k_fun_ (k, all_mappers) fun_
  and map_fun_kind = function | FAsync -> FAsync | FSync -> FSync
  and map_hint (v1, v2) =
    let v1 = map_pos_t v1 and v2 = map_hint_ v2 in (v1, v2)
  and map_hint_ =
    function
    | Hoption v1 -> let v1 = map_hint v1 in Hoption ((v1))
    | Hfun ((v1, v2, v3)) ->
        let v1 = map_of_list map_hint v1
        and v2 = map_of_bool v2
        and v3 = map_hint v3
        in Hfun ((v1, v2, v3))
    | Htuple v1 -> let v1 = map_of_list map_hint v1 in Htuple ((v1))
    | Happly ((v1, v2)) ->
        let v1 = map_id v1
        and v2 = map_of_list map_hint v2
        in Happly ((v1, v2))
    | Hshape v1 -> let v1 = map_of_list map_shape_field v1 in Hshape ((v1))
    | Haccess (v1, v2, v3) ->
        let v1 = map_id v1
        and v2 = map_id v2
        and v3 = map_of_list map_id v3 in Haccess (v1, v2, v3)
  and map_shape_field_name =
    function
    | SFlit v1 -> let v1 = map_pstring v1 in SFlit ((v1))
    | SFclass_const ((v1, v2)) ->
        let v1 = map_id v1 and v2 = map_pstring v2 in SFclass_const ((v1, v2))
  and map_shape_field (v1, v2) =
    let v1 = map_shape_field_name v1 and v2 = map_hint v2 in (v1, v2)
  and map_stmt stmt =
    let k =
      function
      | Unsafe -> Unsafe
      | Fallthrough -> Fallthrough
      | Expr v1 -> let v1 = map_expr v1 in Expr ((v1))
      | Block v1 -> let v1 = map_of_list map_stmt v1 in Block ((v1))
      | Break v1 -> let v1 = map_pos_t v1 in Break ((v1))
      | Continue v1 -> let v1 = map_pos_t v1 in Continue ((v1))
      | Throw v1 -> let v1 = map_expr v1 in Throw ((v1))
      | Return ((v1, v2)) ->
          let v1 = map_pos_t v1
          and v2 = map_of_option map_expr v2
          in Return ((v1, v2))
      | Static_var v1 -> let v1 = map_of_list map_expr v1 in Static_var ((v1))
      | If ((v1, v2, v3)) ->
          let v1 = map_expr v1
          and v2 = map_block v2
          and v3 = map_block v3
          in If ((v1, v2, v3))
      | Do ((v1, v2)) ->
          let v1 = map_block v1 and v2 = map_expr v2 in Do ((v1, v2))
      | While ((v1, v2)) ->
          let v1 = map_expr v1 and v2 = map_block v2 in While ((v1, v2))
      | For ((v1, v2, v3, v4)) ->
          let v1 = map_expr v1
          and v2 = map_expr v2
          and v3 = map_expr v3
          and v4 = map_block v4
          in For ((v1, v2, v3, v4))
      | Switch ((v1, v2)) ->
          let v1 = map_expr v1
          and v2 = map_of_list map_case v2
          in Switch ((v1, v2))
      | Foreach ((v1, v2, v3, v4)) ->
          let v1 = map_expr v1
          and v2 = map_of_option map_pos_t v2
          and v3 = map_as_expr v3
          and v4 = map_block v4
          in Foreach ((v1, v2, v3, v4))
      | Try ((v1, v2, v3)) ->
          let v1 = map_block v1
          and v2 = map_of_list map_catch v2
          and v3 = map_block v3
          in Try ((v1, v2, v3))
      | Noop -> Noop in
    m_in.k_stmt (k, all_mappers) stmt
  and map_as_expr =
    function
    | As_v v1 -> let v1 = map_expr v1 in As_v ((v1))
    | As_kv ((v1, v2)) ->
        let v1 = map_expr v1 and v2 = map_expr v2 in As_kv ((v1, v2))
  and map_block v = map_of_list map_stmt v
  and map_expr expr =
    let k (v1, v2) =
      let v1 = map_pos_t v1 and v2 = map_expr_ v2 in (v1, v2) in
    m_in.k_expr (k, all_mappers) expr
  and map_expr_ expr_ =
    let k =
      function
      | Array v1 -> let v1 = map_of_list map_afield v1 in Array ((v1))
      | Shape v1 ->
          let v1 =
            map_of_list
              (fun (v1, v2) ->
                 let v1 = map_shape_field_name v1
                 and v2 = map_expr v2
                 in (v1, v2))
              v1
          in Shape ((v1))
      | Collection ((v1, v2)) ->
          let v1 = map_id v1
          and v2 = map_of_list map_afield v2
          in Collection ((v1, v2))
      | Null -> Null
      | True -> True
      | False -> False
      | Id v1 -> let v1 = map_id v1 in Id ((v1))
      | Lvar v1 -> let v1 = map_id v1 in Lvar ((v1))
      | Clone v1 -> let v1 = map_expr v1 in Clone ((v1))
      | Obj_get ((v1, v2, v3)) ->
          let v1 = map_expr v1
          and v2 = map_expr v2
          and v3 = map_og_null_flavor v3
          in Obj_get ((v1, v2, v3))
      | Array_get ((v1, v2)) ->
          let v1 = map_expr v1
          and v2 = map_of_option map_expr v2
          in Array_get ((v1, v2))
      | Class_get ((v1, v2)) ->
          let v1 = map_id v1 and v2 = map_pstring v2 in Class_get ((v1, v2))
      | Class_const ((v1, v2)) ->
          let v1 = map_id v1 and v2 = map_pstring v2 in Class_const ((v1, v2))
      | Call ((v1, v2, v3)) ->
          let v1 = map_expr v1
          and v2 = map_of_list map_expr v2
          and v3 = map_of_list map_expr v3
          in Call ((v1, v2, v3))
      | Int v1 -> let v1 = map_pstring v1 in Int ((v1))
      | Float v1 -> let v1 = map_pstring v1 in Float ((v1))
      | String v1 -> let v1 = map_pstring v1 in String ((v1))
      | String2 ((v1, v2)) ->
          let v1 = map_of_list map_expr v1
          and v2 = map_pstring v2
          in String2 ((v1, v2))
      | Yield v1 -> let v1 = map_afield v1 in Yield ((v1))
      | Yield_break -> Yield_break
      | Await v1 -> let v1 = map_expr v1 in Await ((v1))
      | List v1 -> let v1 = map_of_list map_expr v1 in List ((v1))
      | Expr_list v1 -> let v1 = map_of_list map_expr v1 in Expr_list ((v1))
      | Cast ((v1, v2)) ->
          let v1 = map_hint v1 and v2 = map_expr v2 in Cast ((v1, v2))
      | Unop ((v1, v2)) ->
          let v1 = map_uop v1 and v2 = map_expr v2 in Unop ((v1, v2))
      | Binop ((v1, v2, v3)) ->
          let v1 = map_bop v1
          and v2 = map_expr v2
          and v3 = map_expr v3
          in Binop ((v1, v2, v3))
      | Eif ((v1, v2, v3)) ->
          let v1 = map_expr v1
          and v2 = map_of_option map_expr v2
          and v3 = map_expr v3
          in Eif ((v1, v2, v3))
      | InstanceOf ((v1, v2)) ->
          let v1 = map_expr v1 and v2 = map_expr v2 in InstanceOf ((v1, v2))
      | New ((v1, v2, v3)) ->
          let v1 = map_expr v1
          and v2 = map_of_list map_expr v2
          and v3 = map_of_list map_expr v3
          in New ((v1, v2, v3))
      | Efun ((v1, v2)) ->
          let v1 = map_fun_ v1
          and v2 = map_of_list map_use v2
          in Efun ((v1, v2))
      | Lfun v1 -> let v1 = map_fun_ v1 in Lfun ((v1))
      | Xml ((v1, v2, v3)) ->
          let v1 = map_id v1
          and v2 =
            map_of_list
              (fun (v1, v2) ->
                 let v1 = map_id v1 and v2 = map_expr v2 in (v1, v2))
              v2
          and v3 = map_of_list map_expr v3
          in Xml ((v1, v2, v3))
      | Unsafeexpr v1 -> let v1 = map_expr v1 in Unsafeexpr ((v1))
      | Import ((v1, v2)) ->
          let v1 = map_import_flavor v1
          and v2 = map_expr v2
          in Import ((v1, v2))
      | Ref v1 -> let v1 = map_expr v1 in Ref v1
    in m_in.k_expr_ (k, all_mappers) expr_
  and map_use (id, is_ref) =
    let id = map_id id
    and is_ref = map_of_bool is_ref
    in (id, is_ref)
  and map_import_flavor =
    function
    | Include -> Include
    | Require -> Require
    | IncludeOnce -> IncludeOnce
    | RequireOnce -> RequireOnce
  and map_afield =
    function
    | AFvalue v1 -> let v1 = map_expr v1 in AFvalue ((v1))
    | AFkvalue ((v1, v2)) ->
        let v1 = map_expr v1 and v2 = map_expr v2 in AFkvalue ((v1, v2))
  and map_bop =
    function
    | Plus -> Plus
    | Minus -> Minus
    | Star -> Star
    | Starstar -> Starstar
    | Slash -> Slash
    | Eqeq -> Eqeq
    | EQeqeq -> EQeqeq
    | Diff -> Diff
    | Diff2 -> Diff2
    | AMpamp -> AMpamp
    | BArbar -> BArbar
    | Lt -> Lt
    | Lte -> Lte
    | Gt -> Gt
    | Gte -> Gte
    | Dot -> Dot
    | Amp -> Amp
    | Bar -> Bar
    | Ltlt -> Ltlt
    | Gtgt -> Gtgt
    | Percent -> Percent
    | Xor -> Xor
    | Eq v1 -> let v1 = map_of_option map_bop v1 in Eq ((v1))
  and map_uop =
    function
    | Utild -> Utild
    | Unot -> Unot
    | Uplus -> Uplus
    | Uminus -> Uminus
    | Uincr -> Uincr
    | Udecr -> Udecr
    | Upincr -> Upincr
    | Updecr -> Updecr
  and map_case =
    function
    | Default v1 -> let v1 = map_block v1 in Default ((v1))
    | Case ((v1, v2)) ->
        let v1 = map_expr v1 and v2 = map_block v2 in Case ((v1, v2))
  and map_catch (v1, v2, v3) =
    let v1 = map_id v1 and v2 = map_id v2 and v3 = map_block v3 in (v1, v2, v3)
  and map_any = function
    | `MProgram program -> `MProgram (map_program program)
    | `MBlock block -> `MBlock (map_block block)
    | _ -> raise IncorrectMapping
  and all_mappers x = map_any x
  in
  all_mappers

let mk_program_mapper = fun m_in program ->
  match (mk_mapper m_in) (`MProgram program) with
    | `MProgram p -> p
    | _ -> raise IncorrectMapping
