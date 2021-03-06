PGDMP         :                z            issueticket    11.15    11.15 :    X           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false            Y           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false            Z           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                       false            [           1262    16393    issueticket    DATABASE     ?   CREATE DATABASE issueticket WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'English_Indonesia.1252' LC_CTYPE = 'English_Indonesia.1252';
    DROP DATABASE issueticket;
             postgres    false            ?            1259    16402    agent    TABLE     ?   CREATE TABLE public.agent (
    "Ag_ID" integer NOT NULL,
    "Ag_Name" character varying(255),
    "Ag_Email" character varying(255),
    "Ag_No" integer,
    "Ag_Address" character varying(255),
    "Team_Status" boolean
);
    DROP TABLE public.agent;
       public         postgres    false            ?            1259    16426    expiry_hours    TABLE     c   CREATE TABLE public.expiry_hours (
    "Expiry_ID" integer NOT NULL,
    "Expiry_hours" integer
);
     DROP TABLE public.expiry_hours;
       public         postgres    false            ?            1259    16468    failed_jobs    TABLE     &  CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(191) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
    DROP TABLE public.failed_jobs;
       public         postgres    false            ?            1259    16466    failed_jobs_id_seq    SEQUENCE     {   CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.failed_jobs_id_seq;
       public       postgres    false    207            \           0    0    failed_jobs_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;
            public       postgres    false    206            ?            1259    16443 
   migrations    TABLE     ?   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(191) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         postgres    false            ?            1259    16441    migrations_id_seq    SEQUENCE     ?   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public       postgres    false    202            ]           0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
            public       postgres    false    201            ?            1259    16462    password_resets    TABLE     ?   CREATE TABLE public.password_resets (
    email character varying(191) NOT NULL,
    token character varying(191) NOT NULL,
    created_at timestamp(0) without time zone
);
 #   DROP TABLE public.password_resets;
       public         postgres    false            ?            1259    16482    personal_access_tokens    TABLE     ?  CREATE TABLE public.personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type character varying(191) NOT NULL,
    tokenable_id bigint NOT NULL,
    name character varying(191) NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    last_used_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 *   DROP TABLE public.personal_access_tokens;
       public         postgres    false            ?            1259    16480    personal_access_tokens_id_seq    SEQUENCE     ?   CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.personal_access_tokens_id_seq;
       public       postgres    false    209            ^           0    0    personal_access_tokens_id_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;
            public       postgres    false    208            ?            1259    16394 	   requester    TABLE       CREATE TABLE public.requester (
    "Req_ID" integer NOT NULL,
    "Req_Name" character varying(255),
    "Req_Jabatan" character varying(255),
    "Req_Email" character varying(255),
    "Comp_No" integer,
    "Req_No" integer,
    "Req_Addres" character varying(255)
);
    DROP TABLE public.requester;
       public         postgres    false            ?            1259    16410    ticket    TABLE       CREATE TABLE public.ticket (
    "Tick_ID" integer NOT NULL,
    "Ag_ID" integer,
    "Tick_Req" character varying(255),
    "Tick_Subj" character varying(255),
    "Tick_Type" character varying(255),
    "Tick_Issue" text,
    "Tick_Attach" character varying(255),
    "Tick_Status" character varying(255),
    "Tick_Date" date,
    "Tick_Priority" character varying(255),
    "Res_Date" date,
    "Team_ID" integer,
    "Team_Name" character varying(255),
    "Expiry_ID" integer,
    "Expiry_Hours" integer
);
    DROP TABLE public.ticket;
       public         postgres    false            ?            1259    16418    ticket_conv    TABLE     >  CREATE TABLE public.ticket_conv (
    "Log_ID" integer NOT NULL,
    "Tick_ID" character varying(255),
    "Tick_Status" character varying(255),
    "Log_Title" character varying(255),
    "Log_Desc" text,
    "Log_Date" date,
    "Log_Creator" character varying(255),
    "Log_Creator_Type" character varying(255)
);
    DROP TABLE public.ticket_conv;
       public         postgres    false            ?            1259    16451    users    TABLE     x  CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(191) NOT NULL,
    email character varying(191) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(191) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.users;
       public         postgres    false            ?            1259    16449    users_id_seq    SEQUENCE     u   CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public       postgres    false    204            _           0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
            public       postgres    false    203            ?
           2604    16471    failed_jobs id    DEFAULT     p   ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);
 =   ALTER TABLE public.failed_jobs ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    206    207    207            ?
           2604    16446    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    202    201    202            ?
           2604    16485    personal_access_tokens id    DEFAULT     ?   ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);
 H   ALTER TABLE public.personal_access_tokens ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    209    208    209            ?
           2604    16454    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    203    204    204            I          0    16402    agent 
   TABLE DATA               e   COPY public.agent ("Ag_ID", "Ag_Name", "Ag_Email", "Ag_No", "Ag_Address", "Team_Status") FROM stdin;
    public       postgres    false    197   ?E       L          0    16426    expiry_hours 
   TABLE DATA               C   COPY public.expiry_hours ("Expiry_ID", "Expiry_hours") FROM stdin;
    public       postgres    false    200   ?E       S          0    16468    failed_jobs 
   TABLE DATA               a   COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
    public       postgres    false    207   F       N          0    16443 
   migrations 
   TABLE DATA               :   COPY public.migrations (id, migration, batch) FROM stdin;
    public       postgres    false    202   (F       Q          0    16462    password_resets 
   TABLE DATA               C   COPY public.password_resets (email, token, created_at) FROM stdin;
    public       postgres    false    205   ?F       U          0    16482    personal_access_tokens 
   TABLE DATA               ?   COPY public.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, created_at, updated_at) FROM stdin;
    public       postgres    false    209   ?F       H          0    16394 	   requester 
   TABLE DATA               x   COPY public.requester ("Req_ID", "Req_Name", "Req_Jabatan", "Req_Email", "Comp_No", "Req_No", "Req_Addres") FROM stdin;
    public       postgres    false    196   ?F       J          0    16410    ticket 
   TABLE DATA               ?   COPY public.ticket ("Tick_ID", "Ag_ID", "Tick_Req", "Tick_Subj", "Tick_Type", "Tick_Issue", "Tick_Attach", "Tick_Status", "Tick_Date", "Tick_Priority", "Res_Date", "Team_ID", "Team_Name", "Expiry_ID", "Expiry_Hours") FROM stdin;
    public       postgres    false    198   G       K          0    16418    ticket_conv 
   TABLE DATA               ?   COPY public.ticket_conv ("Log_ID", "Tick_ID", "Tick_Status", "Log_Title", "Log_Desc", "Log_Date", "Log_Creator", "Log_Creator_Type") FROM stdin;
    public       postgres    false    199   $G       P          0    16451    users 
   TABLE DATA               u   COPY public.users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at) FROM stdin;
    public       postgres    false    204   AG       `           0    0    failed_jobs_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);
            public       postgres    false    206            a           0    0    migrations_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.migrations_id_seq', 4, true);
            public       postgres    false    201            b           0    0    personal_access_tokens_id_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);
            public       postgres    false    208            c           0    0    users_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.users_id_seq', 1, false);
            public       postgres    false    203            ?
           2606    16409    agent agent_pkey 
   CONSTRAINT     S   ALTER TABLE ONLY public.agent
    ADD CONSTRAINT agent_pkey PRIMARY KEY ("Ag_ID");
 :   ALTER TABLE ONLY public.agent DROP CONSTRAINT agent_pkey;
       public         postgres    false    197            ?
           2606    16430    expiry_hours expiry_hours_pkey 
   CONSTRAINT     e   ALTER TABLE ONLY public.expiry_hours
    ADD CONSTRAINT expiry_hours_pkey PRIMARY KEY ("Expiry_ID");
 H   ALTER TABLE ONLY public.expiry_hours DROP CONSTRAINT expiry_hours_pkey;
       public         postgres    false    200            ?
           2606    16477    failed_jobs failed_jobs_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_pkey;
       public         postgres    false    207            ?
           2606    16479 #   failed_jobs failed_jobs_uuid_unique 
   CONSTRAINT     ^   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);
 M   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_uuid_unique;
       public         postgres    false    207            ?
           2606    16448    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public         postgres    false    202            ?
           2606    16490 2   personal_access_tokens personal_access_tokens_pkey 
   CONSTRAINT     p   ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);
 \   ALTER TABLE ONLY public.personal_access_tokens DROP CONSTRAINT personal_access_tokens_pkey;
       public         postgres    false    209            ?
           2606    16493 :   personal_access_tokens personal_access_tokens_token_unique 
   CONSTRAINT     v   ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);
 d   ALTER TABLE ONLY public.personal_access_tokens DROP CONSTRAINT personal_access_tokens_token_unique;
       public         postgres    false    209            ?
           2606    16401    requester requester_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.requester
    ADD CONSTRAINT requester_pkey PRIMARY KEY ("Req_ID");
 B   ALTER TABLE ONLY public.requester DROP CONSTRAINT requester_pkey;
       public         postgres    false    196            ?
           2606    16425    ticket_conv ticket_conv_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.ticket_conv
    ADD CONSTRAINT ticket_conv_pkey PRIMARY KEY ("Log_ID");
 F   ALTER TABLE ONLY public.ticket_conv DROP CONSTRAINT ticket_conv_pkey;
       public         postgres    false    199            ?
           2606    16417    ticket ticket_pkey 
   CONSTRAINT     W   ALTER TABLE ONLY public.ticket
    ADD CONSTRAINT ticket_pkey PRIMARY KEY ("Tick_ID");
 <   ALTER TABLE ONLY public.ticket DROP CONSTRAINT ticket_pkey;
       public         postgres    false    198            ?
           2606    16461    users users_email_unique 
   CONSTRAINT     T   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);
 B   ALTER TABLE ONLY public.users DROP CONSTRAINT users_email_unique;
       public         postgres    false    204            ?
           2606    16459    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public         postgres    false    204            ?
           1259    16465    password_resets_email_index    INDEX     X   CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);
 /   DROP INDEX public.password_resets_email_index;
       public         postgres    false    205            ?
           1259    16491 8   personal_access_tokens_tokenable_type_tokenable_id_index    INDEX     ?   CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);
 L   DROP INDEX public.personal_access_tokens_tokenable_type_tokenable_id_index;
       public         postgres    false    209    209            ?
           2606    16431    ticket fk_agen    FK CONSTRAINT     |   ALTER TABLE ONLY public.ticket
    ADD CONSTRAINT fk_agen FOREIGN KEY ("Ag_ID") REFERENCES public.agent("Ag_ID") NOT VALID;
 8   ALTER TABLE ONLY public.ticket DROP CONSTRAINT fk_agen;
       public       postgres    false    198    197    2742            d           0    0    CONSTRAINT fk_agen ON ticket    COMMENT     T   COMMENT ON CONSTRAINT fk_agen ON public.ticket IS 'Agen menangani dokumen ticket.';
            public       postgres    false    2765            ?
           2606    16436    ticket fk_expiry    FK CONSTRAINT     ?   ALTER TABLE ONLY public.ticket
    ADD CONSTRAINT fk_expiry FOREIGN KEY ("Expiry_ID") REFERENCES public.expiry_hours("Expiry_ID") NOT VALID;
 :   ALTER TABLE ONLY public.ticket DROP CONSTRAINT fk_expiry;
       public       postgres    false    198    200    2748            e           0    0    CONSTRAINT fk_expiry ON ticket    COMMENT     [   COMMENT ON CONSTRAINT fk_expiry ON public.ticket IS 'team yang menangani dokumen ticket ';
            public       postgres    false    2766            I      x?????? ? ?      L      x?????? ? ?      S      x?????? ? ?      N   x   x?U?A?0??1U??P???2??(??T?~I?????]S?,y?9??!d?"??dE?1JGƝA??oV??<!?Jiʽ*=?5/ʓ?(^il???Z?w???퓴r? ?)i??????(6>}      Q      x?????? ? ?      U      x?????? ? ?      H      x?????? ? ?      J      x?????? ? ?      K      x?????? ? ?      P      x?????? ? ?     