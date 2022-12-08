package tn.esprit.test.entity;


import jakarta.persistence.*;
import lombok.Getter;
import lombok.Setter;

import java.io.Serializable;
import java.util.Set;

@Entity
@Table(name ="medecin")
@Getter
@Setter
public class medecin implements Serializable {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "idmedecin")
    private Long idmedecin;
    private String nomM;
    @Enumerated(EnumType.STRING)
    Specialite specialite;
    private Long telephone;
    private Long prix;
    @ManyToMany(cascade = CascadeType.ALL,mappedBy = "medecin")
    private Set<clinique> cliniques;
    @OneToMany(cascade = CascadeType.ALL,mappedBy = "medecin")
    private Set<rendezvous> rendezvous;





}
