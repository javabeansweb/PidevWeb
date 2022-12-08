package tn.esprit.test.entity;

import jakarta.persistence.*;
import lombok.Getter;
import lombok.Setter;

import java.io.Serializable;
import java.util.Date;

@Entity
@Table(name ="rendezvous")
@Getter
@Setter
public class rendezvous implements Serializable {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "idrdv")
    private Long idrdv;
    @Temporal(TemporalType.DATE)
    private Date daterdv;
    private String remarque;
    @ManyToOne(cascade = CascadeType.ALL)
    private medecin medecin;
    @ManyToOne(cascade = CascadeType.ALL)
    private patien patien;





}
