--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: clients; Type: TABLE; Schema: public; Owner: tom; Tablespace: 
--

CREATE TABLE clients (
    id integer NOT NULL,
    client character varying,
    stylist_id integer
);


ALTER TABLE public.clients OWNER TO tom;

--
-- Name: clients_id_seq; Type: SEQUENCE; Schema: public; Owner: tom
--

CREATE SEQUENCE clients_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.clients_id_seq OWNER TO tom;

--
-- Name: clients_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tom
--

ALTER SEQUENCE clients_id_seq OWNED BY clients.id;


--
-- Name: stylists; Type: TABLE; Schema: public; Owner: tom; Tablespace: 
--

CREATE TABLE stylists (
    id integer NOT NULL,
    stylist character varying
);


ALTER TABLE public.stylists OWNER TO tom;

--
-- Name: stylists_id_seq; Type: SEQUENCE; Schema: public; Owner: tom
--

CREATE SEQUENCE stylists_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.stylists_id_seq OWNER TO tom;

--
-- Name: stylists_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tom
--

ALTER SEQUENCE stylists_id_seq OWNED BY stylists.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tom
--

ALTER TABLE ONLY clients ALTER COLUMN id SET DEFAULT nextval('clients_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: tom
--

ALTER TABLE ONLY stylists ALTER COLUMN id SET DEFAULT nextval('stylists_id_seq'::regclass);


--
-- Data for Name: clients; Type: TABLE DATA; Schema: public; Owner: tom
--

COPY clients (id, client, stylist_id) FROM stdin;
\.


--
-- Name: clients_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tom
--

SELECT pg_catalog.setval('clients_id_seq', 341, true);


--
-- Data for Name: stylists; Type: TABLE DATA; Schema: public; Owner: tom
--

COPY stylists (id, stylist) FROM stdin;
\.


--
-- Name: stylists_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tom
--

SELECT pg_catalog.setval('stylists_id_seq', 375, true);


--
-- Name: clients_pkey; Type: CONSTRAINT; Schema: public; Owner: tom; Tablespace: 
--

ALTER TABLE ONLY clients
    ADD CONSTRAINT clients_pkey PRIMARY KEY (id);


--
-- Name: stylists_pkey; Type: CONSTRAINT; Schema: public; Owner: tom; Tablespace: 
--

ALTER TABLE ONLY stylists
    ADD CONSTRAINT stylists_pkey PRIMARY KEY (id);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

